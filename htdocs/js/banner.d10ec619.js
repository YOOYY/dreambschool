(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["banner"],{1719:function(e,t,n){},2990:function(e,t,n){"use strict";n.r(t);var a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{attrs:{id:"banner"}},[n("v-headpanel",[n("em",[e._v("banner更换")]),e._v(" 首页图片格式是为1920*900px的png，建议用tinypng压缩 ")]),n("el-row",e._l(e.bannerlist,(function(t,a){return n("el-col",{key:a,style:a%4===0?"clear:both":"",attrs:{span:5,offset:a%4===0?0:1}},[n("el-card",{attrs:{"body-style":{padding:"0px"}}},[n("img",{staticClass:"image",attrs:{src:e.website+"/imgs/"+t.path+"/"+t.name+"?"+e.date}}),n("div",{staticClass:"buttonbar"},[n("span",{staticClass:"title"},[e._v(e._s(t.label))]),n("v-upload",{attrs:{name:t.name.slice(0,-4),url:e.url,path:t.path},on:{upload:e.updateImg}})],1)])],1)})),1)],1)},r=[],i=n("f374"),s=(n("6ce8"),n("87ee"),n("b3bc")),c=n("d443"),l=n("7736"),o={data:function(){return{url:"banner",bannerlist:[],date:""}},methods:{updateImg:function(e,t){if("index"===t){var n=e.slice(6,7);this.bannerlist.splice(n-1,1,{id:n,name:e})}this.date=(new Date).getTime()}},created:function(){var e=this;return this.get("bannerlist").then((function(t){e.bannerlist=t})).catch((function(t){e.$message({type:"warning",message:"获取列表失败!失败原因:"+t})}))},computed:Object(i["a"])({},Object(l["c"])(["website"])),components:{"v-headpanel":s["a"],"v-upload":c["a"]}},u=o,d=(n("e448"),n("5d22")),p=Object(d["a"])(u,a,r,!1,null,null,null);t["default"]=p.exports},"6ce8":function(e,t,n){"use strict";var a=n("1294"),r=n("a938"),i=n("94e9"),s=n("a427"),c=n("94c5"),l=n("c209"),o=n("e171"),u=n("1ea7"),d=n("b34c"),p=d("slice"),b=u("species"),f=[].slice,v=Math.max;a({target:"Array",proto:!0,forced:!p},{slice:function(e,t){var n,a,u,d=l(this),p=c(d.length),h=s(e,p),m=s(void 0===t?p:t,p);if(i(d)&&(n=d.constructor,"function"!=typeof n||n!==Array&&!i(n.prototype)?r(n)&&(n=n[b],null===n&&(n=void 0)):n=void 0,n===Array||void 0===n))return f.call(d,h,m);for(a=new(void 0===n?Array:n)(v(m-h,0)),u=0;h<m;h++,u++)h in d&&o(a,u,d[h]);return a.length=u,a}})},e448:function(e,t,n){"use strict";n("1719")}}]);
//# sourceMappingURL=banner.d10ec619.js.map