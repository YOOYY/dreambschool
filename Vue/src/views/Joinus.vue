<template>
    <div id="joinus">
        <v-headpanel>
            <em>招聘信息更换</em>
        </v-headpanel>
        <el-button
            @click="handleCreate"
            style="margin:20px 0"
            type="danger"
            size="small"
        >创建招聘信息</el-button>
        <el-table
            :data="resData"
            style="width: 100%"
        >
            <el-table-column type="expand">
                <template slot-scope="props">
                    <div v-html="props.row.content"></div>
                </template>
            </el-table-column>
            <el-table-column
                label="ID"
                prop="id"
                width="100px"
            >
            </el-table-column>
            <el-table-column
                label="职位"
                prop="name"
            >
            </el-table-column>
            <el-table-column
                label="人数"
                prop="num"
            >
            </el-table-column>
            <el-table-column align="right">
                <template slot-scope="scope">
                    <el-button
                        size="mini"
                        @click="handleEdit(scope.$index, scope.row)"
                    >修改</el-button>
                    <el-button
                        size="mini"
                        type="danger"
                        @click="handleDelete(scope.$index, scope.row)"
                    >删除</el-button>
                </template>
            </el-table-column>
        </el-table>
        <el-dialog
            title="编辑招聘信息"
            :visible.sync="panelShow"
            @opened="open"
            :close-on-click-modal="false"
        >
            <el-form
                :model="form"
                ref="form"
                :inline="true"
            >
                <el-form-item
                    label="职位"
                    label-width="100px"
                    prop="name"
                >
                    <el-input
                        v-model.trim="form.name"
                        autocomplete="off"
                    ></el-input>
                </el-form-item>
                <el-form-item
                    label="人数"
                    label-width="100px"
                    prop="num"
                >
                    <el-input v-model.trim="form.num"></el-input>
                </el-form-item>
                <el-form-item
                    label="内容"
                    label-width="100px"
                    prop="content"
                    class="editorcover"
                >
                    <v-editor
                        ref="text"
                        v-model.trim="form.content"
                        class="editor"
                        :options="editorOption"
                    />
                </el-form-item>
            </el-form>
            <div
                slot="footer"
                class="dialog-footer"
            >
                <el-button @click="closePanel">取 消</el-button>
                <el-button
                    type="primary"
                    @click="submit"
                >确 定</el-button>
            </div>
        </el-dialog>
        <v-upload
            :url="url"
            @upload="upScuccess"
            :uploadType="uploadType"
            ref="upload"
            table='article'
            class="upload"
        >
        </v-upload>
    </div>
</template>

<script>
import Headpanel from "../components/Headpanel.vue";
import Upload from "../components/Upload.vue";
import { mapState } from "vuex";
import { quillEditor } from "vue-quill-editor";
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";
import "quill/dist/quill.bubble.css";
export default {
    data() {
        return {
            url: "uploadfile",
            uploadType: "*",
            editorOption: {},
            textindex: "text",

            type: "create",
            index: "",

            panelShow: false,
            resData: [],
            form: {
                name: "",
                num:"",
                content: "",
            }
        };
    },
    methods: {
        handleEdit(index, row) {
            this.form = JSON.parse(JSON.stringify(row));
            this.panelShow = true;
            this.type = "update";
            this.index = index;
        },
        handleCreate() {
            this.form = {
                name: "",
                num: "",
                content: ""
            };
            this.panelShow = true;
            this.type = "create";
        },
        handleDelete(index, row) {
            this.deleteAjax("deljoin", { id: row.id }, this).then(res => {
                this.resData.splice(index, 1);
                this.$message({
                    type: "success",
                    message: "删除成功"
                });
            });
        },
        closePanel() {
            this.panelShow = false;
        },
        submit() {
            let url = "",
                data = JSON.parse(JSON.stringify(this.form));
            if (this.type === "create") {
                url = "createjoin";
            } else {
                url = "updatejoin";
            }
            this.ajax(url, data)
                .then(res => {
                    // console.log(data);
                    // if (this.type === "create") {
                    //     data.id = res.id;
                    //     this.jobs.forEach(val => {
                    //         if (val.id === data.place) {
                    //             data.jobplace = val.name;
                    //         }
                    //     });
                    //     this.tableData.push(data);
                    // } else if (this.type === "update") {
                    //     this.jobs.forEach(val => {
                    //         if (val.id === data.place) {
                    //             data.jobplace = val.name;
                    //         }
                    //     });
                    //     this.tableData.splice(this.index, 1, data);
                    // } else if (this.type === "jobupdate") {
                    //     this.jobs.splice(this.index, 1, data);
                    // } else {
                    //     data.id = res.id;
                    //     this.jobs.push(data);
                    // }
                    this.resetlist().then(res => {
                        this.closePanel();
                        this.$message({
                            type: "success",
                            message: "操作成功"
                        });
                    });
                })
                .catch(err => {
                    this.$message({
                        type: "error",
                        message: "操作失败" + err
                    });
                });
        },
        open() {
            this.$refs.text.quill
                .getModule("toolbar")
                .addHandler("image", this.imgHandler);
            this.$refs.text.quill
                .getModule("toolbar")
                .addHandler("video", this.videoHandler); // 为视频ICON绑定事件
            this.$refs.text_en.quill
                .getModule("toolbar")
                .addHandler("image", this.imgHandler_en);
            this.$refs.text_en.quill
                .getModule("toolbar")
                .addHandler("video", this.videoHandler_en); // 为视频ICON绑定事件
        },
        upScuccess(res) {
            let vm = this;
            let url = res;

            if (url != null && url.length > 0) {
                // 将文件上传后的URL地址插入到编辑器文本中
                let value = url;
                vm.addRange = vm.$refs[this.textindex].quill.getSelection();
                let index = vm.addRange !== null ? vm.addRange.index : 0;
                value = value.indexOf("http") !== -1 ? value : "http:" + value;
                // if (index != 0) {
                //     vm.$refs.text.quill.insertText(index, "\r", "user");
                //     index += 2;
                // }
                vm.$refs[this.textindex].quill.insertEmbed(
                    index,
                    vm.uploadType,
                    value,
                    "user"
                ); // 调用编辑器的 insertEmbed 方法，插入URL
            } else {
                this.$message.error(`${vm.uploadType}插入失败`);
            }
        },
        // 点击图片ICON触发事件
        imgHandler(state) {
            this.addRange = this.$refs.text.quill.getSelection();
            if (state) {
                this.uploadType = "image";
                this.textindex = "text";
                this.$refs.upload.$refs.inputFile.click();
            }
        },

        // 点击视频ICON触发事件
        videoHandler(state) {
            this.addRange = this.$refs.text.quill.getSelection();
            if (state) {
                this.uploadType = "video";
                this.textindex = "text";
                this.$refs.upload.$refs.inputFile.click();
            }
        },

        resetlist() {
            return this.get("joinlist")
                .then(res => {
                    this.resData = res;
                })
                .catch(e => {
                    this.$message({
                        type: "warning",
                        message: "获取列表失败!失败原因:" + e
                    });
                });
        }
    },
    created() {
        this.resetlist();
    },
    computed: {
        ...mapState(["website"])
    },
    components: {
        "v-headpanel": Headpanel,
        "v-editor": quillEditor,
        "v-upload": Upload
    }
};
</script>

<style lang="scss">
#joinus {
    .editorcover {
        .el-form-item__content {
            width: 80%;
        }
        .ql-container {
            height: 200px !important;
        }
    }
    .ql-editor {
        font-size: 18px;
        -webkit-user-select: text;
    }
    .upload {
        height: 0;
        width: 0;
        opacity: 0;
        overflow: hidden;
    }
}
</style>
