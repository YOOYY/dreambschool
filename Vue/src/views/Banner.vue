<template>
    <div id="banner">
        <v-headpanel>
            <em>banner更换</em>
            图片格式：jpg/png,
            尺寸：首页轮播 1920*950,首页banner 1920x950,分页banner 1920x600,店铺图 960x600,大事记 1920宽 png,业务图1200x900,首页业务图 575x950
        </v-headpanel>
        <el-row>
            <el-col
                :span="5"
                v-for="(o, index) in bannerlist"
                :key="o.id"
                :offset="index%4 === 0 ? 0 : 1"
                :style="index%4 === 0 ? 'clear:both' : ''"
            >
                <el-card :body-style="{ padding: '0px' }">
                    <img
                        :src="website+'/imgs/'+o.path+'/'+o.name"
                        class="image"
                    >
                    <div class="buttonbar">
                        <span class="title">{{o.label}}</span>
                        <v-upload
                            @upload="updateImg"
                            :name="o.name.split('.')[0]"
                            :url="url"
                            :path="o.path"
                            :id="o.id"
                        ></v-upload>
                    </div>
                </el-card>
            </el-col>
        </el-row>
    </div>
</template>

<script>
import Headpanel from "../components/Headpanel.vue";
import Upload from "../components/Upload.vue";
import { mapState } from "vuex";

export default {
    data() {
        return {
            url: "banner",
            bannerlist: []
        };
    },
    methods: {
        updateImg: function(name, path,id) {
            let tmp = this.bannerlist[id - 1];
            let tmp2 = {...tmp,name};
            this.bannerlist.splice(id - 1, 1, tmp2);
        }
    },
    created() {
        return this.get("bannerlist")
            .then(res => {
                this.bannerlist = res;
            })
            .catch(e => {
                this.$message({
                    type: "warning",
                    message: "获取列表失败!失败原因:" + e
                });
            });
    },
    computed: {
        ...mapState(["website"])
    },
    components: {
        "v-headpanel": Headpanel,
        "v-upload": Upload
    }
};
</script>

<style lang='scss'>
#banner {
    .button {
        padding: 0;
        float: right;
    }

    .image {
        width: 100%;
        display: block;
    }
    .el-col {
        margin-bottom: 30px;
    }
    .buttonbar {
        padding: 14px;
        font-size: 18px;
        .title {
            line-height: 34px;
        }
        span {
            font-size: 18px;
            // line-height: 48px;
        }
        .upload {
            float: right;
            margin-bottom: 12px;
        }
    }
}
</style>
