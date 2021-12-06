
<template>
    <div class="upload">
        <slot>
            <el-button
                type="danger"
                size="small"
            >
                上传图片
            </el-button>
        </slot>
        <input
            type="file"
            class="input-file"
            ref="inputFile"
            @change="upload($event)"
            :accept="uploadType"
        >
        <span
            v-loading.fullscreen.lock="loading"
            element-loading-text="插入中,请稍候"
            element-loading-background="rgba(255, 255, 255, 0.3)"
        ></span>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: false
        };
    },
    props: {
        uploadType: {
            type: String,
            default: "image/jpeg,image/jpg,image/png"
        },
        id: {
            type: String,
        },
        table: {
            type: String,
        },
        url: {
            type: String
        },
        path: {
            type: String
        },
        name: {
            type: String,
            default: ""
        }
    },
    methods: {
        upload: function(e) {
            let file = e.target.files[0];
            if (file) {
                this.loading = true;
                let data = new FormData();
                data.append("multfile", file);
                data.append("name", this.name);
                data.append("table", this.table);
                data.append("id", this.id);
                if (this.path) {
                    data.append("path", this.path);
                }
                let path = this.path || "";
                this.ajax(this.url, data)
                    .then(res => {
                        if (res) {
                            this.$emit("upload", res, path,this.id);
                            this.$message({
                                type: "success",
                                message: "上传成功！"
                            });
                            this.clearFiles();
                            this.loading = false;
                        } else {
                            Promise.reject("上传失败");
                        }
                    })
                    .catch(err => {
                        console.log(err);
                        if (err) {
                            this.$message({
                                type: "error",
                                message: err
                            });
                        } else {
                            this.$message({
                                type: "error",
                                message: "上传失败"
                            });
                        }
                        this.clearFiles();
                        this.loading = false;
                    });
            }
        },
        clearFiles() {
            this.$refs.inputFile.value = "";
        }
    }
};
</script>

<style lang="scss" scope>
.upload {
    position: relative;
    cursor: pointer;
    button {
        cursor: pointer;
    }
}
.input-file {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    opacity: 0;
    z-index: 10;
    cursor: pointer;
}
</style>