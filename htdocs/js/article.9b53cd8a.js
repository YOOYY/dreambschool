(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["article"],{1399:function(e,t,i){"use strict";i("d491")},"3ad6":function(e,t,i){"use strict";i.r(t);var l=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{attrs:{id:"article"}},[i("v-headpanel",[i("em",[e._v("文章信息更换")]),e._v("时间格式为 2020-04-02 20:39:42,权重和阅读量请填写数字。 ")]),i("el-button",{staticStyle:{margin:"20px 0"},attrs:{type:"danger",size:"small"},on:{click:e.handleCreate}},[e._v("创建文章信息")]),i("el-table",{staticStyle:{width:"100%"},attrs:{data:e.resData}},[i("el-table-column",{attrs:{type:"expand"},scopedSlots:e._u([{key:"default",fn:function(t){return[i("div",{staticClass:"articleContent",domProps:{innerHTML:e._s(t.row.content)}})]}}])}),i("el-table-column",{attrs:{label:"ID",prop:"id",width:"50px"}}),i("el-table-column",{attrs:{label:"标题",prop:"title"}}),i("el-table-column",{attrs:{label:"描述",prop:"des"}}),i("el-table-column",{attrs:{label:"阅读量",prop:"reader",width:"70px"}}),i("el-table-column",{attrs:{label:"权重",prop:"weight",width:"100px",sortable:"","sort-method":e.sort}}),i("el-table-column",{attrs:{label:"时间",prop:"time",width:"100px"}}),i("el-table-column",{attrs:{align:"right"},scopedSlots:e._u([{key:"default",fn:function(t){return[i("el-button",{attrs:{size:"mini"},on:{click:function(i){return e.handleEdit(t.$index,t.row)}}},[e._v("修改")]),i("el-button",{attrs:{size:"mini",type:"danger"},on:{click:function(i){return e.handleDelete(t.$index,t.row)}}},[e._v("删除")])]}}])})],1),i("el-dialog",{attrs:{title:"编辑文章信息",visible:e.panelShow,"close-on-click-modal":!1},on:{"update:visible":function(t){e.panelShow=t},opened:e.open}},[i("el-form",{ref:"form",attrs:{model:e.form,inline:!0,rules:e.rules}},[i("el-form-item",{attrs:{label:"标题","label-width":"100px",prop:"title"}},[i("el-input",{model:{value:e.form.title,callback:function(t){e.$set(e.form,"title","string"===typeof t?t.trim():t)},expression:"form.title"}})],1),i("el-form-item",{attrs:{label:"描述","label-width":"100px",prop:"des"}},[i("el-input",{model:{value:e.form.des,callback:function(t){e.$set(e.form,"des","string"===typeof t?t.trim():t)},expression:"form.des"}})],1),i("el-form-item",{attrs:{label:"阅读量","label-width":"100px",prop:"reader"}},[i("el-input",{model:{value:e.form.reader,callback:function(t){e.$set(e.form,"reader",e._n(t))},expression:"form.reader"}})],1),i("el-form-item",{attrs:{label:"权重","label-width":"100px",prop:"weight"}},[i("el-input",{model:{value:e.form.weight,callback:function(t){e.$set(e.form,"weight",e._n(t))},expression:"form.weight"}})],1),i("el-form-item",{attrs:{label:"时间","label-width":"100px",prop:"time"}},[i("el-input",{model:{value:e.form.time,callback:function(t){e.$set(e.form,"time","string"===typeof t?t.trim():t)},expression:"form.time"}})],1),i("el-form-item",{staticClass:"editorcover",attrs:{label:"内容","label-width":"100px",prop:"content"}},[i("v-editor",{ref:"text",staticClass:"editor",attrs:{options:e.editorOption},model:{value:e.form.content,callback:function(t){e.$set(e.form,"content","string"===typeof t?t.trim():t)},expression:"form.content"}})],1)],1),i("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[i("el-button",{on:{click:e.closePanel}},[e._v("取 消")]),i("el-button",{attrs:{type:"primary"},on:{click:e.submit}},[e._v("确 定")])],1)],1),i("v-upload",{ref:"upload",staticClass:"upload1",attrs:{url:e.url,uploadType:e.uploadType},on:{upload:e.upScuccess}})],1)},r=[],a=i("f374"),n=(i("87ee"),i("b3bc")),o=i("d443"),s=i("7736"),d=i("b881"),c=(i("121a"),i("7e41"),i("96be"),{data:function(){return{url:"uploadfile",uploadType:"*",editorOption:{},textindex:"text",type:"create",index:"",panelShow:!1,resData:[],form:{title:"",des:"",reader:0,weight:0,time:"",content:""},rules:{title:[{required:!0,message:"请输入标题",trigger:"blur"}],reader:[{required:!0,message:"请输入阅读量",trigger:"blur"}],weight:[{required:!0,message:"请输入权重",trigger:"blur"}],time:[{type:"date",required:!0,message:"请输入时间",trigger:"change"}]}}},methods:{handleEdit:function(e,t){this.form=JSON.parse(JSON.stringify(t)),this.panelShow=!0,this.type="update",this.index=e},handleCreate:function(){this.form={title:"",des:"",reader:0,weight:0,time:this.getdate(),content:""},this.panelShow=!0,this.type="create"},handleDelete:function(e,t){var i=this;this.deleteAjax("delarticle",{id:t.id},this).then((function(t){i.resData.splice(e,1),i.$message({type:"success",message:"删除成功"})}))},closePanel:function(){this.panelShow=!1},submit:function(){var e=this,t="",i=JSON.parse(JSON.stringify(this.form));t="create"===this.type?"createarticle":"updatearticle",this.ajax(t,i).then((function(t){e.resetlist().then((function(t){e.closePanel(),e.$message({type:"success",message:"操作成功"})}))})).catch((function(t){e.$message({type:"error",message:"操作失败"+t})}))},open:function(){this.$refs.text.quill.getModule("toolbar").addHandler("image",this.imgHandler),this.$refs.text.quill.getModule("toolbar").addHandler("video",this.videoHandler),this.$refs["form"].clearValidate()},upScuccess:function(e){var t=this,i=e;if(null!=i&&i.length>0){var l=i;t.addRange=t.$refs[this.textindex].quill.getSelection();var r=null!==t.addRange?t.addRange.index:0;l=-1!==l.indexOf("http")?l:"http:"+l,t.$refs[this.textindex].quill.insertEmbed(r,t.uploadType,l,"user")}else this.$message.error("".concat(t.uploadType,"插入失败"))},updateThumb:function(e){this.form.thumb=e},imgHandler:function(e){this.addRange=this.$refs.text.quill.getSelection(),e&&(this.uploadType="image",this.textindex="text",this.$refs.upload.$refs.inputFile.click())},videoHandler:function(e){this.addRange=this.$refs.text.quill.getSelection(),e&&(this.uploadType="video",this.textindex="text",this.$refs.upload.$refs.inputFile.click())},resetlist:function(){var e=this;return this.get("articlelist").then((function(t){e.resData=t})).catch((function(t){e.$message({type:"warning",message:"获取列表失败!失败原因:"+t})}))},sort:function(e,t){var i=+e.weight-+t.weight;return i},getdate:function(){var e=new Date,t=e.getFullYear(),i=e.getMonth()+1,l=e.getDate();return t+"-"+(i<10?"0"+i:i)+"-"+(l<10?"0"+l:l)+" "+e.toTimeString().substr(0,8)}},created:function(){this.resetlist()},computed:Object(a["a"])({},Object(s["c"])(["website"])),components:{"v-headpanel":n["a"],"v-editor":d["quillEditor"],"v-upload":o["a"]}}),u=c,p=(i("1399"),i("5d22")),f=Object(p["a"])(u,l,r,!1,null,null,null);t["default"]=f.exports},d491:function(e,t,i){}}]);
//# sourceMappingURL=article.9b53cd8a.js.map