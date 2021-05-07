<template>
    <div id="article">
        <v-headpanel>
            <em>业务信息更换</em>&lt;br&gt;是换行符号
        </v-headpanel>

        <el-table
            :data="resData"
            style="width: 100%"
        >
            <el-table-column
                label="ID"
                prop="id"
                width="50px"
            >
            </el-table-column>
            <el-table-column
                label="标题"
                prop="title"
                 width="200px"
            >
            </el-table-column>
            <el-table-column
                label="内容"
                prop="content"
            >
            </el-table-column>
            <el-table-column align="right" width="100px">
                <template slot-scope="scope">
                    <el-button
                        size="mini"
                        @click="handleEdit(scope.$index, scope.row)"
                        type="danger"
                    >修改</el-button>
                </template>
            </el-table-column>
        </el-table>
        <el-dialog
            title="修改业务信息"
            :visible.sync="panelShow"
            @opened="open"
            :close-on-click-modal="false"
        >
            <el-form
                :model="form"
                ref="form"
                :rules="rules"
                style="width:80%;margin:0 auto"
            >
                <el-form-item
                    label="标题"
                    label-width="70px"
                    prop="title"
                >
                    <el-input v-model.trim="form.title"></el-input>
                </el-form-item>
                <el-form-item label="内容" 
                label-width="70px"
                prop="content">
                    <el-input type="textarea" v-model="form.content"
                :autosize="{ minRows: 6, maxRows: 10}"
                    ></el-input>
                </el-form-item>
                <!-- <el-form-item
                    label="内容"
                    prop="content"
                    style="width:100%"
                >
                    <el-input v-model.trim="form.content" 
                        type="textarea"
                        :autosize="{ minRows: 2, maxRows: 4}"
                        width="100%"
                        placeholder="请输入内容"
                        ></el-input>
                </el-form-item> -->
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
    </div>
</template>

<script>
import Headpanel from "../components/Headpanel.vue";
import { mapState } from "vuex";
export default {
    data() {
        return {
            url:'updateservice',
            panelShow: false,
            resData: [],
            form: {
                title: "",
                content: "",
            },
            rules: {
                title: [
                    {
                        required: true,
                        message: "请输入标题",
                        trigger: "blur"
                    }
                ]
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
        closePanel() {
            this.panelShow = false;
        },
        submit() {
            let data = JSON.parse(JSON.stringify(this.form));
            this.ajax(this.url, data)
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
        resetlist() {
            return this.get("servicelist")
                .then(res => {
                    this.resData = res;
                })
                .catch(e => {
                    this.$message({
                        type: "warning",
                        message: "获取列表失败!失败原因:" + e
                    });
                });
        },
    },
    created() {
        this.resetlist();
    },
    computed: {
        ...mapState(["website"])
    },
    components: {
        "v-headpanel": Headpanel
    }
};
</script>

<style lang="scss">
#article {
    .editorcover {
        .ql-container {
            height: 200px !important;
        }
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
