<template>
    <el-container id="cover">
        <el-aside :width="width">
            <v-sideBar></v-sideBar>
        </el-aside>

        <el-container direction="vertical">
            <v-headerBar></v-headerBar>
            <el-main>
                <router-view />
                <div
                    v-if="showTips"
                    class="editermsg"
                >
                    <p>杭州领悟网络提供技术支持</p>
                    <p>技术支持QQ:1604542684</p>
                </div>
            </el-main>
        </el-container>
    </el-container>
</template>

<script>
import Sidebar from "../components/Sidebar.vue";
import Headerbar from "../components/Headerbar.vue";

export default {
    data() {
        return {
            width: "230px"
        };
    },
    components: {
        "v-sideBar": Sidebar,
        "v-headerBar": Headerbar
    },
    computed: {
        showTips: function() {
            return this.$route.name === "admin";
        }
    }
};
</script>

<style lang='scss'>
.el-main {
    min-height: 94.5vh;
    position: relative;
}
.el-aside {
    color: #333;
    overflow: hidden;
}
.el-container {
    background: #f1f4f6;
}
.editermsg {
    position: absolute;
    bottom: 0;
    text-align: center;
    width: 98%;
    p {
        margin: 5px;
        font-weight: bold;
        font-size: 14px;
    }
}
</style>
