(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["users"],{1511:function(a,t,i){"use strict";i.r(t);var e=function(){var a=this,t=a.$createElement,i=a._self._c||t;return i("div",{staticClass:"segments-page2"},[i("div",{staticClass:"container"},[i("h2",[a._v("  "+a._s(this.$route.path)+" ")]),a._l(a.users,function(t){return i("div",{key:t.id,staticClass:"content"},[i("div",[a._v("email:"+a._s(t.email))]),i("div",{staticClass:"slider-caption"},[i("span",[a._v(a._s(t.gender))]),i("h2",[a._v(a._s(t.username))]),i("p",[a._v(a._s(t.mobile_phone))])])])})],2)])},s=[],n=i("2f62"),r={computed:Object(n["e"])({users:function(a){return a.users.users}}),created:function(){this.$store.dispatch("users/getAllUsers")}},o=r,l=i("0c7c"),c=Object(l["a"])(o,e,s,!1,null,null,null);t["default"]=c.exports},"15d0":function(a,t,i){},"328a":function(a,t,i){"use strict";var e=i("15d0"),s=i.n(e);s.a},"54e2":function(a,t,i){"use strict";i.r(t);var e=function(){var a=this,t=a.$createElement,i=a._self._c||t;return i("div",{staticClass:"layui-main user reg"},[i("div",{staticClass:"layui-clear main",staticStyle:{"box-shadow":"0 0 10px #ddd"}},[i("h2",{staticClass:"page-title"},[a._v("用户登陆")]),i("form",{staticClass:"layui-form",on:{submit:function(t){return t.preventDefault(),a.signin(t)}}},[i("div",{staticClass:"layadmin-user-login-box layadmin-user-login-body layui-form"},[i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-username"}),i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-username"}),i("input",{directives:[{name:"model",rawName:"v-model.trim",value:a.signinFormData.name,expression:"signinFormData.name",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"text",required:"","lay-verify":"required",placeholder:"请输入帐号/用户名",autocomplete:"off",maxlength:"256"},domProps:{value:a.signinFormData.name},on:{input:function(t){t.target.composing||a.$set(a.signinFormData,"name",t.target.value.trim())},blur:function(t){return a.$forceUpdate()}}})]),i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-password"}),i("input",{directives:[{name:"model",rawName:"v-model.trim",value:a.signinFormData.pass,expression:"signinFormData.pass",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"password",required:"","lay-verify":"required",placeholder:"请输入登陆密码",autocomplete:"off",maxlength:"256"},domProps:{value:a.signinFormData.pass},on:{input:function(t){t.target.composing||a.$set(a.signinFormData,"pass",t.target.value.trim())},blur:function(t){return a.$forceUpdate()}}})]),i("div",{staticClass:"layui-form-item"},[i("div",{staticClass:"layui-row"},[i("div",{staticClass:"layui-col-xs7"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-auz"}),i("input",{directives:[{name:"model",rawName:"v-model.trim",value:a.signinFormData.captcha,expression:"signinFormData.captcha",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{maxlength:"5","lay-vertype":"tips",placeholder:"请输入图形验证码",type:"text","lay-verify":"required",autocomplete:"off"},domProps:{value:a.signinFormData.captcha},on:{input:function(t){t.target.composing||a.$set(a.signinFormData,"captcha",t.target.value.trim())},blur:function(t){return a.$forceUpdate()}}})]),i("div",{staticClass:"layui-col-xs5"},[i("div",{staticStyle:{"margin-left":"10px"}},[i("img",{staticClass:"layadmin-user-login-codeimg",staticStyle:{"border-color":"#e6e6e6","border-width":"1px","border-style":"solid"},attrs:{src:a.signin_captcha,alt:"点击更新验证码"},on:{click:a.getCaptcha}})])])])]),i("div",{staticClass:"layui-form-item"},[i("span",{staticClass:"fl",staticStyle:{"margin-top":"7px"}},[a._v("没有账号？ \n                  "),i("router-link",{staticStyle:{color:"#029789!important"},attrs:{to:"/signup"}},[a._v("点击注册")])],1),i("span",{staticClass:"fr",staticStyle:{"margin-top":"7px"}},[a._v("忘记密码？ \n                  "),i("router-link",{staticStyle:{color:"#029789!important"},attrs:{to:{name:"forgotpass"}}},[a._v("点击找回\n                  ")])],1)]),a.error?i("div",{staticClass:"layui-form-item"},[i("span",{staticStyle:{"margin-top":"7px",color:"red"}},[a._v(a._s(a.error_message)+" ")])]):a._e(),a._m(0)])])])])])},s=[function(){var a=this,t=a.$createElement,i=a._self._c||t;return i("div",{staticClass:"layui-form-item"},[i("button",{staticClass:"layui-btn layui-btn-fluid layui-btn-normal",attrs:{"lay-submit":"","lay-filter":"login",type:"submit"}},[a._v("立即登陆")])])}],n=i("f499"),r=i.n(n),o=i("cebc"),l=i("2f62"),c=i("4a30"),u=i("bc3a"),m=i.n(u),d="".concat(c["AIP"],"/member/index.php/Member/Signin"),p=void 0,f={data:function(){return{error:!1,error_message:"",signin_captcha:"".concat(c["SIGNIN_CAPTCHA"],"&t=").concat(Math.random()),signinFormData:{type:1}}},computed:Object(l["e"])({}),created:function(){p=this},methods:Object(o["a"])({},Object(l["d"])("auth",["Login"]),{signin:function(){r()(this.signinFormData);return m.a.post("".concat(d),this.signinFormData).then(function(a){a.data.success?(p.Login(a.data.data),window.location.href="/dashboard"):(p.error=!a.data.success,p.error_message=a.data.error_message)}).catch(function(a){console.log(a)}).then(function(){})},getCaptcha:function(){this.signin_captcha="".concat(c["SIGNIN_CAPTCHA"],"&t=").concat(Math.random())}})},y=f,g=(i("5d70"),i("0c7c")),v=Object(g["a"])(y,e,s,!1,null,"70ccb7b6",null);t["default"]=v.exports},"5c9c":function(a,t,i){"use strict";i.r(t);var e=function(){var a=this,t=a.$createElement,i=a._self._c||t;return i("div",{staticClass:"layui-main user reg"},[i("div",{staticClass:"layui-clear main",staticStyle:{"box-shadow":"0 0 10px #ddd"}},[i("h2",{staticClass:"page-title"},[a._v("用户注册")]),i("form",{on:{submit:function(t){return t.preventDefault(),a.signUp(t)}}},[i("div",{staticClass:"layadmin-user-login-box layadmin-user-login-body layui-form"},[i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-username"}),i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-username"}),i("input",{directives:[{name:"model",rawName:"v-model.trim",value:a.signupFormData.name,expression:"signupFormData.name",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"text",required:"","lay-verify":"required",placeholder:"请输入帐号/用户名",autocomplete:"off",maxlength:"256"},domProps:{value:a.signupFormData.name},on:{input:function(t){t.target.composing||a.$set(a.signupFormData,"name",t.target.value.trim())},blur:function(t){return a.$forceUpdate()}}})]),i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-password"}),i("input",{directives:[{name:"model",rawName:"v-model.trim",value:a.signupFormData.pass,expression:"signupFormData.pass",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"password",required:"","lay-verify":"required",placeholder:"请输入密码",autocomplete:"off"},domProps:{value:a.signupFormData.pass},on:{input:function(t){t.target.composing||a.$set(a.signupFormData,"pass",t.target.value.trim())},blur:function(t){return a.$forceUpdate()}}})]),i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-password"}),i("input",{directives:[{name:"model",rawName:"v-model.trim",value:a.signupFormData.repass,expression:"signupFormData.repass",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"password",required:"","lay-verify":"required",placeholder:"请重复密码",autocomplete:"off"},domProps:{value:a.signupFormData.repass},on:{input:function(t){t.target.composing||a.$set(a.signupFormData,"repass",t.target.value.trim())},blur:function(t){return a.$forceUpdate()}}})]),i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-cellphone"}),i("input",{directives:[{name:"model",rawName:"v-model.trim",value:a.signupFormData.phone,expression:"signupFormData.phone",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"text","lay-verify":"required|phone",placeholder:"请输入手机号码",autocomplete:"off"},domProps:{value:a.signupFormData.phone},on:{input:function(t){t.target.composing||a.$set(a.signupFormData,"phone",t.target.value.trim())},blur:function(t){return a.$forceUpdate()}}})]),i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-form"}),i("input",{directives:[{name:"model",rawName:"v-model.trim",value:a.signupFormData.email,expression:"signupFormData.email",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"text","lay-verify":"email",placeholder:"请输入邮箱",autocomplete:"off"},domProps:{value:a.signupFormData.email},on:{input:function(t){t.target.composing||a.$set(a.signupFormData,"email",t.target.value.trim())},blur:function(t){return a.$forceUpdate()}}})]),i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-login-qq"}),i("input",{directives:[{name:"model",rawName:"v-model.trim",value:a.signupFormData.qq_number,expression:"signupFormData.qq_number",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{type:"text",required:"","lay-verify":"required",placeholder:"请输入QQ号码",autocomplete:"off"},domProps:{value:a.signupFormData.qq_number},on:{input:function(t){t.target.composing||a.$set(a.signupFormData,"qq_number",t.target.value.trim())},blur:function(t){return a.$forceUpdate()}}})]),i("div",{staticClass:"layui-form-item"},[i("div",{staticClass:"layui-row"},[i("div",{staticClass:"layui-col-xs7"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-auz"}),i("input",{directives:[{name:"model",rawName:"v-model.trim",value:a.signupFormData.captcha,expression:"signupFormData.captcha",modifiers:{trim:!0}}],staticClass:"layui-input",attrs:{maxlength:"5","lay-vertype":"tips",placeholder:"请输入图形验证码",type:"text","lay-verify":"required",autocomplete:"off"},domProps:{value:a.signupFormData.captcha},on:{input:function(t){t.target.composing||a.$set(a.signupFormData,"captcha",t.target.value.trim())},blur:function(t){return a.$forceUpdate()}}})]),i("div",{staticClass:"layui-col-xs5"},[i("div",{staticStyle:{"margin-left":"10px"}},[i("img",{staticClass:"layadmin-user-login-codeimg",staticStyle:{"border-color":"#e6e6e6","border-width":"1px","border-style":"solid"},attrs:{src:a.signup_captcha,alt:"点击更新验证码"},on:{click:a.getCaptcha},nativeOn:{click:function(t){this.src=a.signup_captcha+Math.random()}}})])])])]),i("div",{staticClass:"layui-form-item",staticStyle:{"margin-bottom":"20px"}},[i("input",{attrs:{type:"checkbox",name:"agreement","lay-skin":"primary",title:"同意用户协议",checked:""}}),i("span",{staticClass:"fr",staticStyle:{"margin-top":"7px"}},[a._v("已有帐号？ \n                                        "),i("router-link",{staticStyle:{color:"#029789!important"},attrs:{to:"/signin"}},[a._v("点击登陆")])],1)]),a.error?i("div",{staticClass:"layui-form-item"},[i("span",{staticStyle:{"margin-top":"7px",color:"red"}},[a._v(a._s(a.error_message)+" ")])]):a._e(),a._m(0)])])])])])},s=[function(){var a=this,t=a.$createElement,i=a._self._c||t;return i("div",{staticClass:"layui-form-item",staticStyle:{"text-align":"center"}},[i("button",{staticClass:"layui-btn layui-btn-fluid layui-btn-normal",attrs:{"lay-submit":"","lay-filter":"reg"}},[a._v("立即注册\n                                ")])])}],n=i("f499"),r=i.n(n),o=i("cebc"),l=i("2f62"),c=i("4a30"),u=i("bc3a"),m=i.n(u),d="".concat(c["AIP"],"/member/index.php/Member/Signup"),p={data:function(){return{error:!1,error_message:"",signup_captcha:"".concat(c["SIGNUP_CAPTCHA"],"&t=").concat(Math.random()),signupFormData:{type:0}}},created:function(){self=this},methods:Object(o["a"])({},Object(l["d"])("auth",["Login"]),{signUp:function(){var a=r()(this.signupFormData);console.log("signupFormData===",this.signupFormData),alert("signin==="+a),alert("API=======>"+d),m.a.post("".concat(d),this.signupFormData).then(function(a){console.log("res.====",a.data),a.data.success?(console.log("res.data.data====",a.data.data),a.data.data.created_at=a.data.data.signinTime,self.Login(a.data.data),window.location.href="/dashboard"):(self.error=!a.data.success,self.error_message=a.data.error_message,console.log("res.data.data====",a.data.error_message))}).catch(function(a){console.log(a)}).then(function(){})},getCaptcha:function(){this.signup_captcha="".concat(c["SIGNUP_CAPTCHA"],"&t=").concat(Math.random())}})},f=p,y=(i("ca79"),i("0c7c")),g=Object(y["a"])(f,e,s,!1,null,"2569ade3",null);t["default"]=g.exports},"5d70":function(a,t,i){"use strict";var e=i("b6b1"),s=i.n(e);s.a},a21f:function(a,t,i){var e=i("584a"),s=e.JSON||(e.JSON={stringify:JSON.stringify});a.exports=function(a){return s.stringify.apply(s,arguments)}},b6b1:function(a,t,i){},ca79:function(a,t,i){"use strict";var e=i("d4df"),s=i.n(e);s.a},d4df:function(a,t,i){},f243:function(a,t,i){"use strict";i.r(t);var e=function(){var a=this,t=a.$createElement,i=a._self._c||t;return i("div",{staticClass:"layui-main user reg"},[i("div",{staticClass:"layui-clear main",staticStyle:{"box-shadow":"0 0 10px #ddd"}},[i("h2",{staticClass:"page-title"},[a._v("密码找回")]),i("div",{staticClass:"layadmin-user-login-box layadmin-user-login-body layui-form"},[i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-username"}),i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-username"}),a._m(0),i("div",{staticClass:"layui-form-item"},[i("div",{staticClass:"layui-row"},[a._m(1),i("div",{staticClass:"layui-col-xs5"},[i("div",{staticStyle:{"margin-left":"10px"}},[i("img",{staticClass:"layadmin-user-login-codeimg",staticStyle:{"border-color":"#e6e6e6","border-width":"1px","border-style":"solid"},attrs:{src:a.forgot_captcha,alt:"点击更新验证码"},on:{click:a.getCaptcha}})])])])]),a._m(2)])])])])])},s=[function(){var a=this,t=a.$createElement,i=a._self._c||t;return i("div",{staticClass:"layui-form-item"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-password"}),i("input",{staticClass:"layui-input",attrs:{type:"text",name:"email","lay-verify":"email",placeholder:"请输入邮箱",autocomplete:"off",maxlength:"256"}})])},function(){var a=this,t=a.$createElement,i=a._self._c||t;return i("div",{staticClass:"layui-col-xs7"},[i("label",{staticClass:"layadmin-user-login-icon layui-icon layui-icon-auz"}),i("input",{staticClass:"layui-input",attrs:{name:"verify","lay-vertype":"tips",maxlength:"5",placeholder:"请输入图形验证码",type:"text","lay-verify":"required",autocomplete:"off"}})])},function(){var a=this,t=a.$createElement,i=a._self._c||t;return i("div",{staticClass:"layui-form-item",staticStyle:{"text-align":"center"}},[i("button",{staticClass:"layui-btn layui-btn-fluid layui-btn-normal",attrs:{"lay-submit":"","lay-filter":"Retrieve"}},[a._v("立即找回")])])}],n=i("2f62"),r=i("4a30"),o=(i("bc3a"),{data:function(){return{forgot_captcha:"".concat(r["FORGOT_CAPTCHA"],"?t=").concat(Math.random()),forgotFormData:{type:1}}},computed:Object(n["e"])({users:function(a){return a.users.users}}),created:function(){},methods:{restPass:function(){alert("restPass"),this.$router.push({name:"signin"})},getCaptcha:function(){this.forgot_captcha="".concat(r["FORGOT_CAPTCHA"],"?t=").concat(Math.random())}}}),l=o,c=(i("328a"),i("0c7c")),u=Object(c["a"])(l,e,s,!1,null,"92191496",null);t["default"]=u.exports},f499:function(a,t,i){a.exports=i("a21f")}}]);
//# sourceMappingURL=users.cfb8d683.js.map