(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["about"],{"05dd":function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement;t._self._c;return t._m(0)},e=[function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"purchase"},[i("div",{staticClass:"layui-tab-content"},[i("div",{staticClass:"layui-tab-item layui-show"},[i("form",{staticClass:"layui-form layui-form-pane"},[i("div",{staticClass:"layui-form-item layui-form-pane"},[i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("时间")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",name:"datebegin",id:"datebegin",placeholder:"开始日期"}})]),i("div",{staticClass:"layui-form-mid"},[t._v("-")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",name:"dateend",id:"dateend",placeholder:"终止日期"}})])]),i("button",{staticClass:"layui-btn layui-btn-sm",attrs:{"lay-submit":"","lay-filter":"serach"}},[i("i",{staticClass:"layui-icon"},[t._v("")]),t._v(" 搜索")])])]),i("table",{staticClass:"layui-table",attrs:{"lay-data":"{ url:'/main/purchase_data.html', page:true, id:'data', limit:15}","lay-filter":"data"}},[i("thead",[i("tr",[i("th",{attrs:{"lay-data":"{type:'numbers', fixed: 'left'}"}}),i("th",{attrs:{"lay-data":"{field:'ordernum',width:200,align:'center'}"}},[t._v("订单号")]),i("th",{attrs:{"lay-data":"{field:'amount',width:200,align:'center'}"}},[t._v("充值金额")]),i("th",{attrs:{"lay-data":"{field:'cstatus',width:200,align:'center'}"}},[t._v("充值状态")]),i("th",{attrs:{"lay-data":"{field:'addtime',width:200,align:'center'}"}},[t._v("充值时间")]),i("th",{attrs:{"lay-data":"{field:'paytime',align:'center'}"}},[t._v("支付时间")])])])])])])])}],l=i("0c7c"),n={},r=Object(l["a"])(n,s,e,!1,null,null,null);a["default"]=r.exports},2149:function(t,a,i){"use strict";var s=i("fd5c"),e=i.n(s);e.a},"554f":function(t,a,i){},"56d2":function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"profile"},[t._m(0),i("div",{staticStyle:{border:"1px solid #e6e6e6","margin-top":"10px"}},[i("form",{staticClass:"layui-form",attrs:{action:""},on:{submit:function(a){return a.preventDefault(),t.chageInfo(a)}}},[i("div",{staticClass:"layui-form-item"},[i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("手机号码")]),i("div",{staticClass:"layui-input-inline"},[i("input",{directives:[{name:"model",rawName:"v-model.trim",value:t.infoFormData.phone,expression:"infoFormData.phone",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"text",id:"phone"},domProps:{value:t.infoFormData.phone},on:{input:function(a){a.target.composing||t.$set(t.infoFormData,"phone",a.target.value.trim())},blur:function(a){return t.$forceUpdate()}}})])])]),i("br"),i("div",{staticClass:"layui-form-item"},[i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("邮  箱")]),i("div",{staticClass:"layui-input-inline"},[i("input",{directives:[{name:"model",rawName:"v-model.trim",value:t.infoFormData.email,expression:"infoFormData.email",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"text",id:"email"},domProps:{value:t.infoFormData.email},on:{input:function(a){a.target.composing||t.$set(t.infoFormData,"email",a.target.value.trim())},blur:function(a){return t.$forceUpdate()}}})])])]),i("br"),i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("Q  Q")]),i("div",{staticClass:"layui-input-inline"},[i("input",{directives:[{name:"model",rawName:"v-model.trim",value:t.infoFormData.qq_number,expression:"infoFormData.qq_number",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"text",id:"qq"},domProps:{value:t.infoFormData.qq_number},on:{input:function(a){a.target.composing||t.$set(t.infoFormData,"qq_number",a.target.value.trim())},blur:function(a){return t.$forceUpdate()}}})])]),i("br"),t._m(1),t._m(2),t._m(3)])])])},e=[function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("blockquote",{staticClass:"layui-elem-quote layui-quote-nm red",staticStyle:{"margin-top":"10px"}},[i("b",[t._v("注意: 请务必完善您的账户信息！邮箱地址为找回密码,接收API到期通知的唯一途径,请务必填写正确有效的邮箱地址！\n          ")])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"layui-form-item"},[i("span",{staticStyle:{"margin-top":"7px",color:"red"}})])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"}),i("div",{staticClass:"layui-input-inline"},[i("button",{staticClass:"layui-btn",attrs:{id:"dosubmit",type:"submit"}},[t._v("立即绑定")])])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"layui-form-item"},[i("span")])}],l=(i("7f7f"),i("f499")),n=i.n(l),r=i("cebc"),c=i("2f62"),u=i("4a30"),o=i("bc3a"),v=i.n(o),d="".concat(u["AIP"],"/member/index.php/Member/Update"),m={name:"Dashboard",data:function(){return{userInfo:this.$store.state.auth.userInfo,infoFormData:{mode:"info",uuid:this.$store.state.auth.userInfo.uuid,phone:this.$store.state.auth.userInfo.phone,email:this.$store.state.auth.userInfo.email,qq_number:this.$store.state.auth.userInfo.qq_number}}},created:function(){self=this},methods:Object(r["a"])({},Object(c["d"])("auth",["Login"]),{chageInfo:function(){n()(this.infoFormData);return v.a.post("".concat(d),this.infoFormData).then(function(t){t.data.success&&(console.log("res.data.success====>",t.data),t.data.data.name=self.userInfo.name,t.data.data.created_at=self.userInfo.created_at,t.data.data.signinTime=self.userInfo.signinTime,self.Login(t.data.data),window.location.href="/dashboard")}).catch(function(t){console.log(t)}).then(function(){})}})},_=m,f=(i("afab"),i("0c7c")),p=Object(f["a"])(_,s,e,!1,null,"c6207412",null);a["default"]=p.exports},"576d":function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"token"},[i("div",{staticClass:"layui-main"},[i("div",{staticClass:"layui-tab layui-tab-card"},[i("div",{staticClass:"layui-card-header layui-bg-gray"},[t._v("TOKEN账号维护             （提示：点击对应token右侧的"),i("B",{staticStyle:{color:"red"}},[t._v("接口面板")]),t._v("按钮,即可看到您已购买的授权接口）"),t._m(0)],1),t._m(1)]),t._m(2)])])},e=[function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("span",{staticClass:"layui-badge-rim fr pointer refresh",staticStyle:{"margin-top":"10px"}},[i("i",{staticClass:"layui-icon layui-icon-refresh",staticStyle:{"font-size":"12px"}}),t._v(" 刷新")])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"layui-card-body"},[i("table",{staticClass:"layui-table text-display",attrs:{"lay-skin":"line",id:"hist-body"}},[i("thead",[i("tr",[i("td",[i("button",{staticClass:"layui-btn layui-btn-normal layui-btn-xs btn-add"},[i("i",{staticClass:"layui-icon"},[t._v("")]),t._v("创建")])]),i("td",[t._v("  账号TOKEN")]),i("td",[t._v("   创建时间")]),i("td",[t._v("   常用功能")]),i("td",[t._v(" 状态")]),i("td",[t._v("备注"),i("span",{staticStyle:{color:"#ac2925"}},[t._v("(点击可修改)")])])])]),i("tbody",{attrs:{id:"test2"}})]),i("div",{staticClass:"text-loding",attrs:{id:"data"}},[t._v("正在刷新接口账号信息...")])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"layui-tab layui-tab-card"},[i("div",{staticClass:"layui-card-header layui-bg-gray"},[t._v("操作注意事项")]),i("div",{staticClass:"layui-card-body"},[i("div",{staticClass:"layui-fluid"},[i("ol",{staticClass:"items"},[i("li",[t._v("这里显示您账号下所有的接口账号（TOKEN），你可以对其进行维护")]),i("li",[t._v("已有消费记录的TOKEN不允许被删除，只能变更代码")]),i("li",[t._v("如果需要单独启用新的接口账号（TOKEN），请单击左上角的"),i("abbr",{attrs:{"lay-tips":"创建新的TOKEN账号"}},[t._v("创建")]),t._v("按钮")]),i("li",[t._v("如果您的TOKEN被人盗用，请在您的"),i("span",{staticStyle:{color:"#01aaed"}},[t._v("技术人员到位的情况下")]),t._v("再点击对应TOKEN左侧的"),i("abbr",{attrs:{"lay-tips":"变更当前TOKEN账号代码"}},[t._v("变更")]),t._v("按钮")]),i("li",{staticStyle:{color:"red"}},[t._v("(重要提醒：TOKEN变更会影响到你现有的业务，请谨慎操作)")]),i("li",[t._v("对于存在多个TOKEN的用户，以免混淆，建议使用“备注”，以便于您区分不同TOEKN，例：用途、网站等")])])])])])}],l=i("0c7c"),n={},r=Object(l["a"])(n,s,e,!1,null,null,null);a["default"]=r.exports},"5c06":function(t,a,i){"use strict";var s=i("f901"),e=i.n(s);e.a},6813:function(t,a,i){},7340:function(t,a,i){},"7f7f":function(t,a,i){var s=i("86cc").f,e=Function.prototype,l=/^\s*function ([^ (]*)/,n="name";n in e||i("9e1e")&&s(e,n,{configurable:!0,get:function(){try{return(""+this).match(l)[1]}catch(t){return""}}})},"8d06":function(t,a,i){"use strict";var s=i("554f"),e=i.n(s);e.a},"977e":function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"recharge"},[i("blockquote",{staticClass:"layui-elem-quote layui-quote-nm red",staticStyle:{"margin-top":"10px"}},[t._v("注意: 充值为在线充值,实时到帐。最小充值金额为1 最大充值金额50000."),i("br"),t._v("注：如需大额充值或公司入款，请联系在线客服获取银行账户进行快捷大额转账,本页面只适用小额自动到账充值"),i("br"),i("br"),i("font",{attrs:{color:"#A020F0"}},[t._v("由于扫码支付限额和安全限制等原因，导致转账成功率低，如遇支付失败,可联系客服手动转账！")])],1),t._m(0),i("div",{staticStyle:{border:"1px solid #e6e6e6","margin-top":"10px"}},[i("br"),i("h3",[t._v("    在线支付如提示限额或提示限制请直接转账至以下账户：")]),i("br"),t._v("    工商银行：  卡号："),i("B",[i("font",{attrs:{color:"#484891"}},[t._v("62220855920292068XX")])],1),t._v("\n      姓名："),i("B",[i("font",{attrs:{color:"#484891"}},[t._v("王XX")])],1),t._v("\n            支行：成都金堂淮洲支行\n    "),i("br"),t._v("    民生银行：  卡号："),i("B",[i("font",{attrs:{color:"#484891"}},[t._v("62261667100080XX")])],1),t._v("\n            姓名："),i("B",[i("font",{attrs:{color:"#484891"}},[t._v("王XX")])],1),t._v("\n        支行：中国民生银行成都清江支行"),i("br"),i("br"),i("h3",[t._v("    转账完成后请联系在线客服为您手动添加余额, 请提供如下转账信息,以便客服及时核对并入款：")]),i("br"),t._v("\n      1. 您的GK网用户名或注册邮箱,QQ,手机号等任意一项"),i("br"),t._v("\n      2. 您的付款时间,付款金额,付款人姓名,或付款账号后4位,付款备注等（也可提供付款截图）"),i("br"),t._v("\n      3. 例如：我在2019-05-22 09:22通过农业银行（尾号8888）支付了500元到王XX工行卡内，我的网站用户名是123456，请尽快帮我充值"),i("br"),i("br")],1)])},e=[function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticStyle:{border:"1px solid #e6e6e6","margin-top":"10px"}},[i("form",{staticClass:"layui-form",attrs:{action:"/main/alipay.html",method:"get",target:"_blank"}},[i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layui-form-label",staticStyle:{"line-height":"52px"}},[t._v("充值方式")]),i("div",{staticClass:"layui-input-block"},[i("div",{staticClass:"paylist"},[i("div",{attrs:{id:"banks"}},[i("ul",[i("li",{staticClass:"cursor ybh",attrs:{payid:"zfb"}},[i("img",{attrs:{src:"//127.0.0.1:8484/index/images/method-ali.png",alt:"支付宝支付",align:"absmiddle"}}),t._v("支付宝支付")]),i("li",{staticClass:"cursor",staticStyle:{width:"145px"},attrs:{payid:"wx2"}},[i("img",{attrs:{src:"//127.0.0.1:8484/index/images/method-wx.png",alt:"微信支付官方",align:"absmiddle"}}),t._v("微信支付(官方)")]),i("li",{staticClass:"cursor",attrs:{payid:"qq"}},[i("img",{attrs:{src:"//127.0.0.1:8484/index/images/method-qq.png",alt:"QQ钱包支付",align:"absmiddle"}}),t._v("QQ钱包支付")]),i("li",{staticClass:"cursor",attrs:{payid:"qq2"}},[i("img",{attrs:{src:"//127.0.0.1:8484/index/images/method-qq.png",alt:"QQ钱包官方",align:"absmiddle"}}),t._v("QQ钱包(官方)")])]),i("div",{staticStyle:{clear:"left"}})]),i("input",{attrs:{type:"hidden",name:"paytype",id:"paytype",value:"zfb"}})])])]),i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layui-form-label"},[t._v("充值金额")]),i("div",{staticClass:"layui-input-block"},[i("input",{attrs:{type:"radio",name:"sex",value:"50",title:"50","lay-filter":"switchTest"}}),i("input",{attrs:{type:"radio",name:"sex",value:"100",title:"100","lay-filter":"switchTest"}}),i("input",{attrs:{type:"radio",name:"sex",value:"135",title:"135","lay-filter":"switchTest"}}),i("input",{attrs:{type:"radio",name:"sex",value:"200",title:"200","lay-filter":"switchTest"}}),i("input",{attrs:{type:"radio",name:"sex",value:"480",title:"480","lay-filter":"switchTest"}}),i("input",{attrs:{type:"radio",name:"sex",value:"",title:"自定义","lay-filter":"switchTest"}})])]),i("div",{staticClass:"layui-form-item price"},[i("label",{staticClass:"layui-form-label"},[t._v("自定义金额")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"number",name:"price",value:"",id:"price",placeholder:"请输入金额",autocomplete:"off","lay-verify":"price"}})])]),i("div",{staticClass:"layui-form-item"},[i("div",{staticClass:"layui-input-block",staticStyle:{"padding-left":"120px"}},[i("button",{staticClass:"layui-btn",attrs:{"lay-submit":"","lay-filter":"submit"}},[i("i",{staticClass:"layui-icon"},[t._v("")]),t._v("    立即充值")])])])])])}],l={beforeRouteEnter:function(t,a,i){i()}},n=l,r=(i("5c06"),i("0c7c")),c=Object(r["a"])(n,s,e,!1,null,null,null);a["default"]=c.exports},9917:function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement;t._self._c;return t._m(0)},e=[function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"buylog"},[i("div",{staticClass:"layui-tab-content"},[i("div",{staticClass:"layui-tab-item layui-show"},[i("form",{staticClass:"layui-form layui-form-pane"},[i("div",{staticClass:"layui-form-item layui-form-pane"},[i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("购买时间")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",name:"datebegin",id:"datebegin",placeholder:"开始日期"}})]),i("div",{staticClass:"layui-form-mid"},[t._v("-")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",name:"dateend",id:"dateend",placeholder:"终止日期"}})])]),i("button",{staticClass:"layui-btn layui-btn-sm",attrs:{"lay-submit":"","lay-filter":"serach"}},[i("i",{staticClass:"layui-icon"},[t._v("")]),t._v(" 搜索")])])]),i("table",{staticClass:"layui-table",attrs:{"lay-data":"{ url:'/main/buylog_data.html', page:true, id:'data', limit:15}","lay-filter":"data"}},[i("thead",[i("tr",[i("th",{attrs:{"lay-data":"{type:'numbers', fixed: 'left'}"}}),i("th",{attrs:{"lay-data":"{field:'lotterytype',width:200,align:'center'}"}},[t._v("彩种类型")]),i("th",{attrs:{"lay-data":"{field:'purchaseday',width:200,align:'center'}"}},[t._v("购买时长")]),i("th",{attrs:{"lay-data":"{field:'amount',width:200,align:'center'}"}},[t._v("金额")]),i("th",{attrs:{"lay-data":"{field:'paytime',width:200,align:'center'}"}},[t._v("支付时间")]),i("th",{attrs:{"lay-data":"{field:'cmark',align:'center'}"}},[t._v("备注")])])])])])])])}],l=i("0c7c"),n={},r=Object(l["a"])(n,s,e,!1,null,null,null);a["default"]=r.exports},a21f:function(t,a,i){var s=i("584a"),e=s.JSON||(s.JSON={stringify:JSON.stringify});t.exports=function(t){return e.stringify.apply(e,arguments)}},afab:function(t,a,i){"use strict";var s=i("6813"),e=i.n(s);e.a},b8fa:function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"layui-main"},[s("div",{staticClass:"layui-tab"},[s("div",{staticClass:"layui-card-body"},[s("div",{staticClass:"layui-fluid"},[s("div",{staticClass:"box layui-text"},[s("h1",[t._v("联系我们")]),s("center",[s("p",[t._v("如果您在使用GK网API接口过程中产生任何疑问，或者您对我们网站有任何意见或者建议，请及时联系我们。")]),s("br"),s("p",[t._v("E-mail：Admin@gk.com   负责内容：投诉建议、BUG提交、商务合作")]),s("br"),s("p",[t._v("客服QQ：XXXXXX "),s("a",{attrs:{target:"_blank",href:"http://wpa.qq.com/msgrd?v=3&uin=3301666096&site=qq&menu=yes"}},[s("img",{attrs:{border:"0",src:"http://pub.idqqimg.com/qconn/wpa/button/button_111.gif",alt:"QQ",title:"点击这里给我发消息"}})]),t._v("   负责内容：产品咨询、业务办理、充值及售后服务。")]),s("br"),s("br"),s("h3",[t._v("公司地址：四川省成都市锦江区正熙国际")]),s("br"),s("img",{attrs:{border:"0",src:i("cddd"),height:"",width:"75%"}})])],1)])])])])},e=[],l=(i("bba9"),i("0c7c")),n={},r=Object(l["a"])(n,s,e,!1,null,"52d67eb4",null);a["default"]=r.exports},bba9:function(t,a,i){"use strict";var s=i("be44"),e=i.n(s);e.a},be3d:function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement;t._self._c;return t._m(0)},e=[function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"amountlog"},[i("div",{staticClass:"layui-tab-content"},[i("div",{staticClass:"layui-tab-item layui-show"},[i("form",{staticClass:"layui-form layui-form-pane"},[i("div",{staticClass:"layui-form-item layui-form-pane"},[i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("时间")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",name:"datebegin",id:"datebegin",placeholder:"开始日期"}})]),i("div",{staticClass:"layui-form-mid"},[t._v("-")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",name:"dateend",id:"dateend",placeholder:"终止日期"}})])]),i("button",{staticClass:"layui-btn layui-btn-sm",attrs:{"lay-submit":"","lay-filter":"serach"}},[i("i",{staticClass:"layui-icon"},[t._v("")]),t._v(" 搜索")])])]),i("table",{staticClass:"layui-table",attrs:{"lay-data":"{ url:'/main/amountlog_data.html', page:true, id:'data', limit:15}","lay-filter":"data"}},[i("thead",[i("tr",[i("th",{attrs:{"lay-data":"{type:'numbers', fixed: 'left'}"}}),i("th",{attrs:{"lay-data":"{field:'amount',width:150,align:'center'}"}},[t._v("变动金额")]),i("th",{attrs:{"lay-data":"{field:'lastamount',width:150,align:'center'}"}},[t._v("变动后余额")]),i("th",{attrs:{"lay-data":"{field:'addtime',width:200,align:'center'}"}},[t._v("变动时间")]),i("th",{attrs:{"lay-data":"{field:'cmark',align:'center'}"}},[t._v("备注")])])])])])])])}],l=i("0c7c"),n={},r=Object(l["a"])(n,s,e,!1,null,null,null);a["default"]=r.exports},be44:function(t,a,i){},c136:function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"jcb-main"},[i("div",{staticClass:"cont-box-detail"},[i("div",{staticClass:"box"},[i("H1",[t._v("一、 接口概述")]),t._m(0),i("p",[t._v("GK网的开奖数据来源默认为各地福彩或体彩中心提供，如果福彩或体彩中心不再经营某彩票的销售，我们会在不通知用户的情况下停止供应该彩票数据接口。")]),i("h1",[t._v("二、 接口限制")]),i("p",[t._v("GK网API开放平台(付费接口)的开奖结果"),i("high",[t._v("需要")]),t._v("进行注册或申请以后方可调用。")],1),i("p",[t._v("GK网API开放平台(付费接口)的开奖结果默认是实时提供"),i("high",[t._v("零延迟")]),t._v("，相对官方延迟-1至5秒，但由于网络或其它技术原因，偶尔有可能对开奖时间产生数秒延迟。")],1),i("p",[t._v("GK网API开放平台(付费接口)的每个注册账户下默认每种彩票每天不超过"),i("red",[t._v("3个IP地址同时访问。")])],1),i("p",[t._v("接口“按照最新查询”供频繁请求使用，请求限制为每个IP地址请求每个接口的间隔必须大于3秒，推荐间隔5-10秒。")]),i("p",[t._v("接口“按照日期查询”仅供补漏时使用，请求限制为每个IP地址请求每个接口的间隔必须大于20秒，推荐间隔30-40秒。")]),i("p",[i("high",[i("b",[t._v("注：如需要更多的服务器IP能同时并发访问，请将接口购买到不同token下,每个token支持3个IP地址同时访问。")])])],1),i("h1",[t._v("三、购买与试用")]),t._m(1),t._m(2),i("h1",[t._v("四、接口说明")]),i("p",[t._v("GK网API开放平台(付费接口)提供稳定的彩票开奖信息，包括开奖期号、开奖号码、开奖时间（部份彩种还提供下期期号与倒计时）以及更多数据。")]),i("p",[t._v("GK网API开放平台只提供基于web的访问方式，格式支持xml与json两种格式，以后会陆续推出基于Socket、httpPush等的调用方式。")]),i("p",[t._v("GK网API开放平台彩票json接口支持以callback作为回调参数的jsonp调用方式。")]),i("table",[i("tr",[i("td",[t._v("付费接口网址")]),i("td",{attrs:{colspan:"3"}},[i("b",[t._v("http://api.b1api.com/api?p="),i("high",[t._v("[返回格式]")]),t._v("&t=\n               "),i("high",[t._v("[彩票代码]")]),t._v("&limit="),i("high",[t._v("[返回行数]")]),t._v("&token=\n               "),i("high",[t._v("[接口密钥]")])],1)])]),t._m(3),t._m(4),t._m(5),t._m(6),t._m(7),i("tr",[i("td",[t._v("付费接口例程")]),i("td",{attrs:{colspan:"2"}},[i("b",[t._v("http://api.b1api.com/api?p="),i("high",[t._v("xml")]),t._v("&t="),i("high",[t._v("cqssc")]),t._v("&limit="),i("high",[t._v("1")]),t._v("&token="),i("high",[t._v("123")])],1),t._v("(重庆时时彩xml格式1行utf-8编码)"),i("br"),i("b",[t._v("http://api.b1api.com/api?p="),i("high",[t._v("json")]),t._v("&t="),i("high",[t._v("cqssc")]),t._v("&limit="),i("high",[t._v("3")]),t._v("&token="),i("high",[t._v("123")])],1),t._v("(重庆时时彩json格式3行utf-8编码)"),i("br"),i("b",[t._v("http://api.b1api.com/api?p="),i("high",[t._v("json")]),t._v("&t="),i("high",[t._v("cqssc")]),t._v("&limit="),i("high",[t._v("5")]),t._v("&token="),i("high",[t._v("123")])],1),t._v("(重庆时时彩json格式5行utf-8编码)"),i("br"),i("b",[t._v("http://api.b1api.com/api?p="),i("high",[t._v("xml")]),t._v("&t="),i("high",[t._v("cqssc")]),t._v("&token="),i("high",[t._v("123")]),t._v("&date="),i("high",[t._v("20160516")])],1),t._v("(重庆时时彩xml格式返回20160516当天所有数据)"),i("br")]),i("td",[t._v("注：所有参数不区别大小写")])])]),t._m(8),i("h1",[t._v("五、演示下载")]),t._m(9),i("h1",[t._v("六、免责声明")]),i("p",[t._v("在使用GK网API开放平台之前，请您务必仔细阅读并透彻理解本声明。您可以选择不使用GK网API开放平台，但如果您使用GK网API开放平台，您的使用行为将被视为对本声明全部内容的认可。")]),i("p"),i("p",[t._v("除GK网API开放平台注明之服务条款外，其他一切因使用GK网API开放平台而可能遭致的意外、疏忽、侵权及其造成的损失（包括因下载被搜索链接到的第三方网站内容而感染电脑病毒），GK网对其概不负责，亦不承担任何法律责任。")]),i("p"),i("p",[t._v("任何通过使用GK网API开放平台而链接到的第三方网页均系他人制作或提供，您可能从该第三方网页上获得资讯及享用服务，GK网对其合法性概不负责，亦不承担任何法律责任。")]),i("p",[t._v("任何单位或个人认为通过GK网API开放平台链接到的第三方网页内容可能涉嫌侵犯其信息网络传播权，应该及时向GK网提出书面权利通知，并提供身份证明、权属证明及详细侵权情况证明。GK网在收到上述法律文件后，将会依法尽快断开相关链接内容。详情参见特定频道的著作权保护声明。")]),i("p"),i("p",[t._v("用户明确同意其使用本网站网络服务所存在的风险将完全由其自己承担；因其使用本网站网络服务而产生的一切后果也由其自己承担，GK网对用户不承担任何责任。")]),i("p",[t._v("下列情况时本网站亦毋需承担任何责任：")]),i("p",[t._v("1、由于您将账户或密码告知他人或与他人共享注册账户，由此导致的任何个人资料泄露及损失。")]),i("p",[t._v("2、任何由于黑客攻击、计算机病毒侵入或发作、因政府管理而造成的暂时性关闭等影响网络正常经营之不可抗力而造成的个人资料泄露、丢失、被盗用或被窜改等。")]),i("p",[t._v("3、由于与本网站链接的其它网站所造成之个人资料泄露及由此而导致的任何法律争议和后果。")]),i("p",[t._v("4、本站各频道内容除标明“GK网出品”外，其余内容皆由签约内容服务提供商（机构）、网友提供，本公司不承担由于内容的合法性及健康性所引起的一切争议和法律责任。如有疑异,请与本公司客服中心联系，我们将尽快处理。")]),i("p",[t._v("5、本网站网页上有与其他网站网页的链接，包括旗帜广告和网页上的其他广告。本网对其他任何网站的内容、隐私政策或运营，或经营这些网站的公司的行为概不负责。在向这些与本网链接的网站提供个人信息之前，请查阅它们的隐私政策。")]),i("p",[t._v("6、本站所有API开奖接口均为福彩官网及机构所提供,开奖结果如出现错误或漏开,黑客入侵等不可抗因素,本站不承担任何经济损失及法律责任,如您不认可本条款,请立即停用GK网开奖接口,以免造成不必要的纠纷！")]),i("p",[t._v("7、本站所有帖子、评论仅代表作者个人观点，不代表本站,欢迎大家对侵犯版权等不合法和不健康的内容进行监督和举报。")])],1)])])},e=[function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("p",[t._v("GK网API开放平台("),i("span",{staticStyle:{color:"#333","font-weight":"bold"}},[t._v("BLotteryAPI")]),t._v(")是GK网面向网络媒体、彩票行业客户、第三方彩票销售或分析机构等用户，通过web方式提供开奖数据服务的官方平台。是国内专业面向各彩票相关网站、开发人员和彩票分析的彩票开奖API开发接口。")])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("p",[t._v("自助试用功能已经完成，有需要的用户请访问“"),i("a",{attrs:{href:"/index/lottery_type.html",target:"_blank"}},[t._v("免费试用通道")]),t._v("”自助开通试用账号,获取试用API接口。")])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("p",[t._v("自助购买功能已经完成，有需要的用户请访问“"),i("a",{attrs:{href:"/index/lottery.html",target:"_blank"}},[t._v("开奖API接口租用页面")]),t._v("”查看购买事项。")])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("tr",[i("td",[t._v("参数名称")]),i("td",[t._v("是否必填")]),i("td",[t._v("参数说明")]),i("td",[t._v("参数演示")])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("tr",[i("td",[i("b",[t._v("[返回格式]")])]),i("td",[t._v("必填")]),i("td",[t._v("返回的数据格式，xml或json")]),i("td",[t._v("xml,json")])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("tr",[i("td",[i("b",[t._v("[彩票代码]")])]),i("td",[t._v("必填")]),i("td",[t._v("详见彩票列表")]),i("td",[t._v("重庆时时彩：cqssc"),i("br"),t._v("双色球：ssq")])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("tr",[i("td",[i("b",[t._v("[返回行数]")])]),i("td",[t._v("选填")]),i("td",[t._v("不填时默认返回1行数据，如果需要返回不同的行数时填写，范围从1行到20行，")]),i("td",[t._v("填写1-20均可,最多只返回20条")])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("tr",[i("td",[i("b",[t._v("[接口密钥]")])]),i("td",[t._v("必填")]),i("td",[t._v("你购买的账户接口密钥，注：接口密钥不区分大小写，"),i("br")]),i("td",[t._v("97ea1teb952bv903")])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticStyle:{margin:"0px 0px 10px 20px"}},[i("div",{staticStyle:{display:"none"}})])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("ul",{staticClass:"download"},[i("a",{attrs:{href:"/resource/yanshi/php-xml.zip",target:"_blank"}},[i("li",{staticClass:"rar"},[i("span",[t._v("PHP采集Xml演示")])])]),i("a",{attrs:{href:"/resource/yanshi/php-json.zip",target:"_blank"}},[i("li",{staticClass:"rar"},[i("span",[t._v("PHP采集Json演示")])])]),i("a",{attrs:{href:"/resource/yanshi/asp-xml.zip",target:"_blank"}},[i("li",{staticClass:"rar"},[i("span",[t._v("Asp采集Xml演示")])])]),i("a",{attrs:{href:"/resource/yanshi/jquery-xml.zip",target:"_blank"}},[i("li",{staticClass:"rar"},[i("span",[t._v("JQuery采集Xml演示")])])]),i("a",{attrs:{href:"/resource/yanshi/jquery-json.zip",target:"_blank"}},[i("li",{staticClass:"rar"},[i("span",[t._v("JQuery采集Json演示")])])]),i("a",{attrs:{href:"/resource/yanshi/csharp-xml.zip",target:"_blank"}},[i("li",{staticClass:"rar"},[i("span",[t._v("CSharp采集xml演示")])])]),i("a",{attrs:{href:"/resource/yanshi/csharp-json.zip",target:"_blank"}},[i("li",{staticClass:"rar"},[i("span",[t._v("CSharp采集json演示")])])]),i("a",{attrs:{href:"/",target:"_blank"}},[i("li",{staticClass:"rar"},[i("span",[t._v("(暂无) 手机端采集xml演示")])])]),i("a",{attrs:{href:"/",target:"_blank"}},[i("li",{staticClass:"rar"},[i("span",[t._v("(暂无) 手机端采集Json演示")])])])])}],l=(i("db2b"),i("0c7c")),n={},r=Object(l["a"])(n,s,e,!1,null,"fcc1abf2",null);a["default"]=r.exports},c442:function(t,a,i){},cddd:function(t,a,i){t.exports=i.p+"static/img/ditu.ba959d72.png"},d804:function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"agent segments-page2"},[i("div",{staticClass:"container"},[i("router-view"),t._m(0),t._m(1),t._m(2),t._m(3)],1)])},e=[function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"section-title"},[i("h3",[t._v("AGENT")])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"row"},[i("div",{staticClass:"col s6"},[i("div",{staticClass:"content"},[i("img",{attrs:{src:"images/agent1.jpg",alt:""}}),i("div",{staticClass:"text"},[i("a",{attrs:{href:"agent-details.html"}},[i("h5",[t._v("Carlos Blake")])]),i("span",[t._v("Agent")])])])]),i("div",{staticClass:"col s6"},[i("div",{staticClass:"content"},[i("img",{attrs:{src:"images/agent2.jpg",alt:""}}),i("div",{staticClass:"text"},[i("a",{attrs:{href:"agent-details.html"}},[i("h5",[t._v("Ed Gabriel")])]),i("span",[t._v("Agent")])])])])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"row"},[i("div",{staticClass:"col s6"},[i("div",{staticClass:"content"},[i("img",{attrs:{src:"images/agent3.jpg",alt:""}}),i("div",{staticClass:"text"},[i("a",{attrs:{href:"agent-details.html"}},[i("h5",[t._v("Jervis Smith")])]),i("span",[t._v("Agent")])])])]),i("div",{staticClass:"col s6"},[i("div",{staticClass:"content"},[i("img",{attrs:{src:"images/agent4.jpg",alt:""}}),i("div",{staticClass:"text"},[i("a",{attrs:{href:"agent-details.html"}},[i("h5",[t._v("Kingston")])]),i("span",[t._v("Agent")])])])])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"row"},[i("div",{staticClass:"col s6"},[i("div",{staticClass:"content"},[i("img",{attrs:{src:"images/agent5.jpg",alt:""}}),i("div",{staticClass:"text"},[i("a",{attrs:{href:"agent-details.html"}},[i("h5",[t._v("Samuelson")])]),i("span",[t._v("Agent")])])])]),i("div",{staticClass:"col s6"},[i("div",{staticClass:"content"},[i("img",{attrs:{src:"images/agent6.jpg",alt:""}}),i("div",{staticClass:"text"},[i("a",{attrs:{href:"agent-details.html"}},[i("h5",[t._v("Rowley")])]),i("span",[t._v("Agent")])])])])])}],l=i("0c7c"),n={},r=Object(l["a"])(n,s,e,!1,null,null,null);a["default"]=r.exports},db2b:function(t,a,i){"use strict";var s=i("c442"),e=i.n(s);e.a},e124:function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"jcb-main alone-nav"},[i("div",{staticClass:"userinfo"},[i("blockquote",{staticClass:"layui-elem-quote"},[t._v("登陆名:\n            "),i("B",[i("span",{staticClass:"red"},[t._v(t._s(t.userInfo.name))])]),t._v("\n                 可用余额:\n            "),i("B",[i("span",{staticClass:"red"},[t._v("0.00")])]),t._v("  \n              "),i("router-link",{staticClass:"layui-btn layui-btn-sm",attrs:{to:{name:"recharge"}}},[i("i",{staticClass:"layui-icon"},[t._v("")]),t._v("  立即充值")]),t._v("    最后登陆时间:"),i("B",[i("span",{staticClass:"red"},[t._v(t._s(t.userInfo.signinTime))])])],1)]),i("ul",{staticClass:"layui-tab-title"},[i("router-link",{attrs:{to:{name:"dashboard"},tag:"li","active-class":"layui-this"}},[i("a",[t._v("个人资料")])]),i("router-link",{attrs:{to:{name:"token"},tag:"li","active-class":"layui-this"}},[i("a",[t._v("接口管理")])]),i("router-link",{attrs:{to:{name:"profile"},tag:"li","active-class":"layui-this"}},[i("a",[t._v("资料修改")])]),i("router-link",{attrs:{to:{name:"buylog"},tag:"li","active-class":"layui-this"}},[i("a",[t._v("购买记录")])]),i("router-link",{attrs:{to:{name:"purchaselog"},tag:"li","active-class":"layui-this"}},[i("a",[t._v("充值记录")])]),i("router-link",{attrs:{to:{name:"amountlog"},tag:"li","active-class":"layui-this"}},[i("a",[t._v("资金变动记录")])]),i("router-link",{attrs:{to:{name:"recharge"},tag:"li","active-class":"layui-this"}},[i("a",[t._v("在线充值")])])],1),i("router-view",{staticClass:"child-view"})],1)},e=[],l={name:"Dashboard",data:function(){return{userInfo:this.$store.state.auth.userInfo}}},n=l,r=(i("f842"),i("0c7c")),c=Object(r["a"])(n,s,e,!1,null,"ba492f8c",null);a["default"]=c.exports},f499:function(t,a,i){t.exports=i("a21f")},f7fc:function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"changepass"},[i("blockquote",{staticClass:"layui-elem-quote layui-quote-nm red",staticStyle:{"margin-top":"10px",color:"#ff0000"}},[t._v("注意: 新版本API接口的token值改为用户自助生成,修改密码不会变更token值.如需变更token请至接口管理页面修改,变更token后180秒生效")]),i("div",{staticStyle:{border:"1px solid #e6e6e6","margin-top":"10px"}},[i("form",{staticClass:"layui-form",attrs:{action:""},on:{submit:function(a){return a.preventDefault(),t.chagePass(a)}}},[i("input",{directives:[{name:"model",rawName:"v-model.trim",value:t.infoFormData.uuid,expression:"infoFormData.uuid",modifiers:{trim:!0}}],attrs:{type:"hidden"},domProps:{value:t.infoFormData.uuid},on:{input:function(a){a.target.composing||t.$set(t.infoFormData,"uuid",a.target.value.trim())},blur:function(a){return t.$forceUpdate()}}}),i("div",{staticClass:"layui-form-item"},[i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("用户名")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",readonly:""},domProps:{value:t.userInfo.name}})])]),t._m(0),i("br"),i("br")]),i("div",{staticClass:"layui-form-item"},[i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("手机号码")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",readonly:""},domProps:{value:t.userInfo.phone}})])]),i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("邮  箱")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",readonly:""},domProps:{value:t.userInfo.email}})])]),i("br"),i("br")]),i("div",{staticClass:"layui-form-item"},[i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("Q  Q")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",readonly:""},domProps:{value:t.userInfo.qq_number}})])]),i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("注册时间")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",readonly:""},domProps:{value:t.userInfo.created_at}})])]),i("br"),i("br")]),i("div",{staticClass:"layui-form-item"},[i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("登录时间")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input",attrs:{type:"text",readonly:""},domProps:{value:t.userInfo.signinTime}})])]),i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("密码框")]),i("div",{staticClass:"layui-input-inline"},[i("input",{directives:[{name:"model",rawName:"v-model.trim",value:t.infoFormData.password,expression:"infoFormData.password",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"password",required:"","lay-verify":"required",placeholder:"不修改请留空",autocomplete:"off"},domProps:{value:t.infoFormData.password},on:{input:function(a){a.target.composing||t.$set(t.infoFormData,"password",a.target.value.trim())},blur:function(a){return t.$forceUpdate()}}})])]),t._m(1)])])])])},e=[function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"layui-inline"},[i("label",{staticClass:"layui-form-label"},[t._v("余额")]),i("div",{staticClass:"layui-input-inline"},[i("input",{staticClass:"layui-input red",attrs:{type:"text",readonly:"",value:"0.00",autocomplete:"off"}})])])},function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"layui-inline"},[i("button",{staticClass:"layui-btn",attrs:{"lay-submit":"","lay-filter":"submit",type:"submit"}},[t._v("修改密码")])])}],l=i("f499"),n=i.n(l),r=i("cebc"),c=i("2f62"),u=i("4a30"),o=i("bc3a"),v=i.n(o),d="".concat(u["AIP"],"/member/index.php/Member/Update"),m={name:"Changepass",data:function(){return{userInfo:this.$store.state.auth.userInfo,infoFormData:{mode:"pass",uuid:this.$store.state.auth.userInfo.uuid}}},created:function(){self=this},methods:Object(r["a"])({},Object(c["d"])("auth",["LogOut"]),{chagePass:function(){n()(this.infoFormData);return v.a.post("".concat(d),this.infoFormData).then(function(t){t.data.success&&(self.LogOut(),window.location.href="/signin")}).catch(function(t){console.log(t)}).then(function(){})}})},_=m,f=(i("8d06"),i("0c7c")),p=Object(f["a"])(_,s,e,!1,null,"409cf8d5",null);a["default"]=p.exports},f820:function(t,a,i){"use strict";i.r(a);var s=function(){var t=this,a=t.$createElement;t._self._c;return t._m(0)},e=[function(){var t=this,a=t.$createElement,i=t._self._c||a;return i("div",{staticClass:"layui-main"},[i("div",{staticClass:"layui-tab"},[i("div",{staticClass:"layui-card-body"},[i("div",{staticClass:"layui-fluid"},[i("div",{staticClass:"box layui-text"},[i("h1",[t._v("关于我们")]),i("p",[t._v("成都市锦江区GK网络工作室是一家多年完全致力于中国及世界各地公益彩票事业，提供全方位彩票开奖及彩票相关服务的提供商。")]),i("p",[t._v("旗下GK网API以中国市场为技术研发基地,以互联网技术、电信技术、无线应用技术为依托，将创新的技术与传统的彩票产业相结合，面向全球彩票服务市场，提供最快最全的彩票开奖相关服务，包括彩票开奖结果调用、彩票系统的研发、彩票开奖移动客户端，及彩票产品创新等。")]),i("p",[t._v("GK网API拥有一流的技术研发创新实力以及国内外多年的彩票网站运营及管理经验，为中国以及全球彩票玩家提供一流的彩票创新产品及优质的服务。GK网API本着专业、诚信、服务至上的经营理念， 充分发挥机动灵活的运营及管理机制，伴随着中国互联网及手机互联网时代的腾飞、彩票市场的不断繁荣，和各方客户的忠诚支持，将全面促进新型彩票服务市场的全盛发展。")])]),i("fieldset",{staticClass:"layui-elem-field layui-field-title"},[i("legend",[t._v("更新记录")]),i("div",{staticClass:"layui-field-box"},[i("ul",{staticClass:"layui-timeline"},[i("li",{staticClass:"layui-timeline-item"},[i("i",{staticClass:"layui-icon layui-timeline-axis"},[t._v("")]),i("div",{staticClass:"layui-timeline-content layui-text"},[i("h3",{staticClass:"layui-timeline-title"},[t._v("2019/02/28\n                                            "),i("span",{staticClass:"layui-badge-rim"},[t._v("V3.0.1新版更新")]),i("span",{staticClass:"layui-badge-dot"})]),i("ul",[i("li",[t._v("数据结构更新开放用户多TOKEN功能。一个帐号同时可以拥有多个TOKEN接口")]),i("li",[t._v("新增开奖历史查询页面，支持按天或按日期查询，方便各位会员查询漏期数据补单！")]),i("li",[t._v("开奖历史,接口购买页面由于彩种日益增多，此次添加了搜索彩种功能,方便会员查找购买指定接口。")])])])]),i("li",{staticClass:"layui-timeline-item"},[i("i",{staticClass:"layui-icon layui-timeline-axis"},[t._v("")]),i("div",{staticClass:"layui-timeline-content layui-text"},[i("h3",{staticClass:"layui-timeline-title"},[t._v("2018/12/17")]),i("ul",[i("li",[t._v("API服务器全面升级,DDOS防护能力提升至360GB")]),i("li",[t._v("增加API接口备用地址 主接口：api.b1api.com 备用接口：api.b1cp.com")])])])]),i("li",{staticClass:"layui-timeline-item"},[i("i",{staticClass:"layui-icon layui-timeline-axis"},[t._v("")]),i("div",{staticClass:"layui-timeline-content layui-text"},[i("h3",{staticClass:"layui-timeline-title"},[t._v("2018/10/09")]),i("ul",[i("li",[t._v("GKAPI官网界面重整,页面美化,新增了API占用IP查询清理功能")]),i("li",[i("span",{staticStyle:{color:"#ff5722"}},[t._v("新版本用户可自助登陆查询及清理API占用IP！")])])])])]),i("li",{staticClass:"layui-timeline-item"},[i("i",{staticClass:"layui-icon layui-timeline-axis"},[t._v("")]),i("div",{staticClass:"layui-timeline-content layui-text"},[i("h3",{staticClass:"layui-timeline-title"},[t._v("2018/05/06")]),i("ul",[i("li",[t._v("API接口重要升级,分布式数据库设计,用到同时4种数据库工作,智能DNS负载均衡提升了稳定性")])])])]),i("li",{staticClass:"layui-timeline-item"},[i("i",{staticClass:"layui-icon layui-timeline-axis"},[t._v("")]),i("div",{staticClass:"layui-timeline-content layui-text"},[i("h3",{staticClass:"layui-timeline-title"},[t._v("2017/08/13")]),i("ul",[i("li",[t._v("官网改版,新增网站公告,新闻资讯,技术文档栏目！关闭了原GK网论坛")])])])]),i("li",{staticClass:"layui-timeline-item"},[i("i",{staticClass:"layui-icon layui-timeline-axis"},[t._v("")]),i("div",{staticClass:"layui-timeline-content layui-text"},[i("h3",{staticClass:"layui-timeline-title"},[t._v("2017/04/03")]),i("ul",[i("li",[t._v("开放免费试用功能"),i("span",{staticStyle:{color:"#ff174c"}},[t._v("(GK网活跃用户数突破3000人)")])])])])]),i("li",{staticClass:"layui-timeline-item"},[i("i",{staticClass:"layui-icon layui-timeline-axis"},[t._v("")]),i("div",{staticClass:"layui-timeline-content layui-text"},[i("h3",{staticClass:"layui-timeline-title"},[t._v("2017/01/28 GK网正式上线运营")])])])])])])])])])])}],l=(i("2149"),i("0c7c")),n={},r=Object(l["a"])(n,s,e,!1,null,"0c06cb68",null);a["default"]=r.exports},f842:function(t,a,i){"use strict";var s=i("7340"),e=i.n(s);e.a},f901:function(t,a,i){},fd5c:function(t,a,i){}}]);
//# sourceMappingURL=about.3dfdd240.js.map