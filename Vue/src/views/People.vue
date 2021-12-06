<template>
    <div id="article">
        <v-headpanel>
            <em>教师学员信息更换</em>教师图片尺寸 420x550 jpg/png,学员尺寸575x950 jpg/png,名字图片 75x25 锐字真言体免费商用,&lt;br&gt;是换行符号,学员信息展示前4条
        </v-headpanel>

        <el-button
            @click="handleCreate"
            style="margin:20px 0"
            type="danger"
            size="small"
        >创建教师学员信息</el-button>
        <el-select
            v-model="value"
            placeholder="请选择类型"
            style="margin-left:20px"
        >
            <el-option
                v-for="(item) in select"
                :key="item.id"
                :label="item.name"
                :value="item.id"
            >
            </el-option>
        </el-select>
        <el-table
            :data="tableData"
            style="width: 100%"
        >
            <el-table-column type="expand">
                <template slot-scope="props">
                    <el-tag type="danger">内容</el-tag>
                    <div
                        v-html="props.row.content"
                        class="articleContent"
                    ></div>
                </template>
            </el-table-column>
            <el-table-column
                label="ID"
                prop="id"
                width="50px"
            >
            </el-table-column>
            <el-table-column
                label="姓名"
                prop="name"
            >
                <template slot-scope="scope">
                    <img
                        :src="scope.row.name"
                        alt=""
                    >
                </template>
            </el-table-column>
            <el-table-column
                label="描述"
                prop="des"
            >
            </el-table-column>
            <el-table-column
                label="类型"
                prop="type"
                width="70px"
            >
                <template slot-scope="scope">
                    {{scope.row.type|typetab}}
                </template>
            </el-table-column>
            <el-table-column
                label="图片"
                prop="thumb"
            >
                <template slot-scope="scope">
                    <img
                        :src="scope.row.thumb"
                        alt=""
                    >
                </template>
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
            title="编辑文章信息"
            :visible.sync="panelShow"
            @opened="open"
            :close-on-click-modal="false"
        >
            <el-form
                :model="form"
                ref="form"
                :inline="true"
                :rules="rules"
            >
                <el-form-item
                    :label="form.type == 1?'描述':'名称'"
                    label-width="100px"
                    prop="des"
                >
                    <el-input v-model.trim="form.des"></el-input>
                </el-form-item>
                <el-form-item
                    label="类型"
                    label-width="100px"
                    prop="type"
                >
                    <el-select
                        v-model.trim="form.type"
                        placeholder="请选择"
                    >
                        <el-option
                            v-for="item in peopletype"
                            :key="item.id"
                            :label="item.name"
                            :value="item.id"
                        >
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item
                    label="姓名"
                    label-width="100px"
                    prop="name"
                    v-show="form.type == 1"
                >
                    <v-upload
                        @upload="updateName"
                        table='people'
                        :url="url"
                    >
                        <el-button type="danger">上传姓名图片</el-button>
                    </v-upload>
                </el-form-item>
                <el-form-item
                    label="缩略图"
                    label-width="100px"
                    prop="thumb"
                >
                    <v-upload
                        @upload="updateThumb"
                        table='people'
                        :url="url"
                    >
                        <el-button type="danger">上传人物图片</el-button>
                    </v-upload>

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
            table='people'
            class="upload1"
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
                des: "",
                type: "1",
                content: "",
            },
            peopletype: [
                { id: "1", name: "教师" },
                { id: "2", name: "学员" }
            ],
            rules: {
                type: [
                    {
                        required: true,
                        message: "请选择类型",
                        trigger: "change"
                    }
                ]
            },
            select: [],
            value: "0"
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
                des: "",
                type: "1",
                content: "",
            };
            this.panelShow = true;
            this.type = "create";
        },
        handleDelete(index, row) {
            this.deleteAjax("delpeople", { id: row.id }, this).then(res => {
                this.tableData.splice(index, 1);
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
                url = "createpeople";
            } else {
                url = "updatepeople";
            }
            this.ajax(url, data)
                .then(res => {
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
            this.$refs["form"].clearValidate();
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
        updateThumb(res) {
            this.form.thumb = res;
        },
        updateName(res) {
            this.form.name = res;
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
            return this.get("peoplelist")
                .then(res => {
                    this.resData = res;
                    this.select = [{ name: "全部", id: "0" }].concat(
                        this.peopletype
                    );
                })
                .catch(e => {
                    this.$message({
                        type: "warning",
                        message: "获取列表失败!失败原因:" + e
                    });
                });
        },
        sort(a, b) {
            let res = +a.weight - +b.weight;
            return res;
        },
        getdate() {
            var now = new Date(),
                y = now.getFullYear(),
                m = now.getMonth() + 1,
                d = now.getDate();
            return (
                y +
                "-" +
                (m < 10 ? "0" + m : m) +
                "-" +
                (d < 10 ? "0" + d : d) +
                " " +
                now.toTimeString().substr(0, 8)
            );
        }
    },
    created() {
        this.resetlist();
    },
    computed: {
        tableData: function() {
            if (!+this.value) {
                return this.resData;
            } else {
                let arr = [];
                this.resData.forEach(val => {
                    if (val.type === this.value) {
                        arr.push(val);
                    }
                });
                return arr;
            }
        },
        ...mapState(["website"])
    },
    components: {
        "v-headpanel": Headpanel,
        "v-editor": quillEditor,
        "v-upload": Upload
    },
    filters: {
        typetab(value) {
            let tabs = ["教师", "学员"];
            return tabs[value - 1];
        }
    }
};
</script>

<style lang="scss">
#article {
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
    .upload1 {
        height: 0;
        width: 0;
        opacity: 0;
        overflow: hidden;
    }
    img {
        max-width: 100%;
    }
    .articleContent {
        img {
            width: 100%;
        }
    }
}
</style>
