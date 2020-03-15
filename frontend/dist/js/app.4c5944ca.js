(function(t){function e(e){for(var s,n,l=e[0],o=e[1],u=e[2],d=0,v=[];d<l.length;d++)n=l[d],Object.prototype.hasOwnProperty.call(r,n)&&r[n]&&v.push(r[n][0]),r[n]=0;for(s in o)Object.prototype.hasOwnProperty.call(o,s)&&(t[s]=o[s]);c&&c(e);while(v.length)v.shift()();return i.push.apply(i,u||[]),a()}function a(){for(var t,e=0;e<i.length;e++){for(var a=i[e],s=!0,l=1;l<a.length;l++){var o=a[l];0!==r[o]&&(s=!1)}s&&(i.splice(e--,1),t=n(n.s=a[0]))}return t}var s={},r={app:0},i=[];function n(e){if(s[e])return s[e].exports;var a=s[e]={i:e,l:!1,exports:{}};return t[e].call(a.exports,a,a.exports,n),a.l=!0,a.exports}n.m=t,n.c=s,n.d=function(t,e,a){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:a})},n.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var a=Object.create(null);if(n.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var s in t)n.d(a,s,function(e){return t[e]}.bind(null,s));return a},n.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="/";var l=window["webpackJsonp"]=window["webpackJsonp"]||[],o=l.push.bind(l);l.push=e,l=l.slice();for(var u=0;u<l.length;u++)e(l[u]);var c=o;i.push([0,"chunk-vendors"]),a()})({0:function(t,e,a){t.exports=a("56d7")},"034f":function(t,e,a){"use strict";var s=a("85ec"),r=a.n(s);r.a},"56d7":function(t,e,a){"use strict";a.r(e);a("b0c0"),a("e260"),a("e6cf"),a("cca6"),a("a79d");var s=a("2b0e"),r=a("8c4f"),i=a("a7fe"),n=a.n(i),l=a("bc3a"),o=a.n(l),u=a("323e"),c=a.n(u),d=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"container",attrs:{id:"app"}},[a("nav",{staticClass:"navbar navbar-expand-sm bg-light"},[a("ul",{staticClass:"navbar-nav"},[a("li",{staticClass:"nav-item"},[a("router-link",{staticClass:"nav-link",attrs:{to:{name:"Create"}}},[t._v("Add Subscriber")])],1),a("li",{staticClass:"nav-item"},[a("router-link",{staticClass:"nav-link",attrs:{to:{name:"Index"}}},[t._v("All Subscribers")])],1)])]),a("transition",{attrs:{name:"fade"}},[a("div",{staticClass:"gap"},[a("router-view")],1)])],1)},v=[],p={},b=p,m=(a("034f"),a("2877")),f=Object(m["a"])(b,d,v,!1,null,null,null),h=f.exports,_=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"container"},[a("div",{staticClass:"card"},[t._m(0),a("div",{staticClass:"card-body"},[a("form",{on:{submit:function(e){return e.preventDefault(),t.addSubscriber(e)}}},[a("div",{staticClass:"form-group"},[a("label",[t._v("Email:")]),a("input",{directives:[{name:"model",rawName:"v-model",value:t.subscriber.email,expression:"subscriber.email"}],staticClass:"form-control",attrs:{type:"text"},domProps:{value:t.subscriber.email},on:{input:function(e){e.target.composing||t.$set(t.subscriber,"email",e.target.value)}}})]),a("div",{staticClass:"form-group"},[a("label",[t._v("Name:")]),a("input",{directives:[{name:"model",rawName:"v-model",value:t.subscriber.name,expression:"subscriber.name"}],staticClass:"form-control",attrs:{type:"text"},domProps:{value:t.subscriber.name},on:{input:function(e){e.target.composing||t.$set(t.subscriber,"name",e.target.value)}}})]),a("div",{staticClass:"form-group"},[a("label",[t._v("State:")]),a("select",{directives:[{name:"model",rawName:"v-model",value:t.subscriber.state,expression:"subscriber.state"}],staticClass:"form-control",attrs:{id:"state"},on:{change:function(e){var a=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){var e="_value"in t?t._value:t.value;return e}));t.$set(t.subscriber,"state",e.target.multiple?a:a[0])}}},[a("option",{attrs:{value:"active"}},[t._v("Active")]),a("option",{attrs:{value:"unsubscribed"}},[t._v("Unsubscribed")]),a("option",{attrs:{value:"junk"}},[t._v("Junk")]),a("option",{attrs:{value:"bounce"}},[t._v("Bounce")]),a("option",{attrs:{value:"unconfirmed"}},[t._v("Unconfirmed")])])]),a("div",{staticClass:"form-group"},[a("button",{staticClass:"btn btn-secondary",attrs:{type:"button"},on:{click:function(e){return t.addField()}}},[t._v("New Field")])]),a("div",{staticClass:"form-group"},t._l(t.lines,(function(e,s){return a("div",{key:s,staticClass:"row"},[a("div",{staticClass:"col-lg-10"},[a("div",{staticClass:"row"},[a("div",{staticClass:"col-3"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.title,expression:"line.title"}],staticClass:"form-control",attrs:{placeholder:"Title"},domProps:{value:e.title},on:{input:function(a){a.target.composing||t.$set(e,"title",a.target.value)}}})]),a("div",{staticClass:"col-3"},[a("select",{directives:[{name:"model",rawName:"v-model",value:e.type,expression:"line.type"}],staticClass:"form-control",on:{change:function(a){var s=Array.prototype.filter.call(a.target.options,(function(t){return t.selected})).map((function(t){var e="_value"in t?t._value:t.value;return e}));t.$set(e,"type",a.target.multiple?s:s[0])}}},[a("option",{attrs:{value:"date"}},[t._v("Date")]),a("option",{attrs:{value:"number"}},[t._v("Number")]),a("option",{attrs:{value:"string"}},[t._v("String")]),a("option",{attrs:{value:"boolean"}},[t._v("Boolean")])])]),a("div",{staticClass:"col-5"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.value,expression:"line.value"}],staticClass:"form-control",attrs:{label:"Value",placeholder:"Value"},domProps:{value:e.value},on:{input:function(a){a.target.composing||t.$set(e,"value",a.target.value)}}})])])]),a("div",{staticClass:"col-2"},[a("div",{staticClass:"block float-right"},[a("button",{attrs:{type:"button",round:""},on:{click:function(e){return t.removeField(s)}}},[a("i",{staticClass:"fa fa-close"})]),s+1===t.lines.length?a("button",{attrs:{type:"button",round:""},on:{click:function(e){return t.addField()}}},[a("i",{staticClass:"fa fa-plus"})]):t._e()])])])})),0),t._m(1)])])])])},g=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"card-header"},[a("h3",[t._v("Add Subscriber")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"form-group"},[a("input",{staticClass:"btn btn-primary",attrs:{type:"submit",value:"Add Item"}})])}],C=(a("4de4"),a("4160"),a("a434"),a("159b"),{components:{},data:function(){return{subscriber:{},lines:[],blockRemoval:!0}},methods:{addSubscriber:function(){var t=this;this.subscriber.fields=[],this.lines.forEach((function(e){if(null==e.type)return t.subscriber.fields=[],void alert("You must select a type for the field.");t.subscriber.fields.push(e)}));var e="http://localhost/api/subscriber/create.php";this.axios.post(e,this.subscriber).then((function(t){console.log(t.data)})).catch((function(t){alert(t.response.data.message)}))},addField:function(){var t=this.lines.filter((function(t){return null===t.title}));t.length>=1&&this.lines.length>0?alert("You must complete this fied before adding a new one."):this.lines.push({title:null,type:null,value:null})},removeField:function(t){this.lines.splice(t,1)}}}),y=C,x=Object(m["a"])(y,_,g,!1,null,null,null),w=x.exports,S=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"container"},[a("div",{staticClass:"card"},[t._m(0),a("div",{staticClass:"card-body"},[a("form",{on:{submit:function(e){return e.preventDefault(),t.updateSubscriber(e)}}},[a("div",{staticClass:"form-group"},[a("label",[t._v("Email:")]),a("input",{directives:[{name:"model",rawName:"v-model",value:t.subscriber.email,expression:"subscriber.email"}],staticClass:"form-control",attrs:{type:"text"},domProps:{value:t.subscriber.email},on:{input:function(e){e.target.composing||t.$set(t.subscriber,"email",e.target.value)}}})]),a("div",{staticClass:"form-group"},[a("label",[t._v("Name:")]),a("input",{directives:[{name:"model",rawName:"v-model",value:t.subscriber.name,expression:"subscriber.name"}],staticClass:"form-control",attrs:{type:"text"},domProps:{value:t.subscriber.name},on:{input:function(e){e.target.composing||t.$set(t.subscriber,"name",e.target.value)}}})]),a("div",{staticClass:"form-group"},[a("label",[t._v("State:")]),a("select",{directives:[{name:"model",rawName:"v-model",value:t.subscriber.state,expression:"subscriber.state"}],staticClass:"form-control",attrs:{id:"state"},on:{change:function(e){var a=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){var e="_value"in t?t._value:t.value;return e}));t.$set(t.subscriber,"state",e.target.multiple?a:a[0])}}},[a("option",{attrs:{value:"active"}},[t._v("Active")]),a("option",{attrs:{value:"unsubscribed"}},[t._v("Unsubscribed")]),a("option",{attrs:{value:"junk"}},[t._v("Junk")]),a("option",{attrs:{value:"bounce"}},[t._v("Bounce")]),a("option",{attrs:{value:"unconfirmed"}},[t._v("Unconfirmed")])])]),a("div",{staticClass:"form-group"},[a("button",{staticClass:"btn btn-secondary",attrs:{type:"button"},on:{click:function(e){return t.addField()}}},[t._v("New Field")])]),a("div",{staticClass:"form-group"},t._l(t.lines,(function(e,s){return a("div",{key:s,staticClass:"row"},[a("div",{staticClass:"col-lg-10"},[a("div",{staticClass:"row"},[a("div",{staticClass:"col-3"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.title,expression:"line.title"}],staticClass:"form-control",attrs:{placeholder:"Title"},domProps:{value:e.title},on:{input:function(a){a.target.composing||t.$set(e,"title",a.target.value)}}})]),a("div",{staticClass:"col-3"},[a("select",{directives:[{name:"model",rawName:"v-model",value:e.type,expression:"line.type"}],staticClass:"form-control",on:{change:function(a){var s=Array.prototype.filter.call(a.target.options,(function(t){return t.selected})).map((function(t){var e="_value"in t?t._value:t.value;return e}));t.$set(e,"type",a.target.multiple?s:s[0])}}},[a("option",{attrs:{value:"date"}},[t._v("Date")]),a("option",{attrs:{value:"number"}},[t._v("Number")]),a("option",{attrs:{value:"string"}},[t._v("String")]),a("option",{attrs:{value:"boolean"}},[t._v("Boolean")])])]),a("div",{staticClass:"col-5"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.value,expression:"line.value"}],staticClass:"form-control",attrs:{label:"Value",placeholder:"Value"},domProps:{value:e.value},on:{input:function(a){a.target.composing||t.$set(e,"value",a.target.value)}}})])])]),a("div",{staticClass:"col-2"},[a("div",{staticClass:"block float-right"},[a("button",{attrs:{type:"button",round:""},on:{click:function(e){return t.removeField(s)}}},[a("i",{staticClass:"fa fa-close"})]),s+1===t.lines.length?a("button",{attrs:{type:"button",round:""},on:{click:function(e){return t.addField()}}},[a("i",{staticClass:"fa fa-plus"})]):t._e()])])])})),0),t._m(1)])])])])},k=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"card-header"},[a("h3",[t._v("Edit Subscriber")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"form-group"},[a("input",{staticClass:"btn btn-primary",attrs:{type:"submit",value:"Update Subscriber"}})])}],$={data:function(){return{subscriber:{},lines:[]}},created:function(){this.getSubscriber()},methods:{getSubscriber:function(){var t=this,e="http://localhost/api/subscriber/read_one.php?id="+this.$route.params.id;this.axios.get(e).then((function(e){t.subscriber=e.data,t.subscriber.fields.forEach((function(e){t.lines.push(e)}))}))},updateSubscriber:function(){var t=this;this.subscriber.fields=[],this.lines.forEach((function(e){t.subscriber.fields.push(e)}));var e="http://localhost/api/subscriber/update.php";this.axios.post(e,this.subscriber).then((function(){t.$router.push({name:"Index"})}))},addField:function(){var t=this.lines.filter((function(t){return null===t.title}));t.length>=1&&this.lines.length>0||this.lines.push({title:null,type:null,value:null})},removeField:function(t){this.lines.splice(t,1)}}},E=$,N=Object(m["a"])(E,S,k,!1,null,null,null),j=N.exports,O=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("h1",[t._v("Subscribers")]),a("table",{staticClass:"table table-hover"},[t._m(0),a("tbody",t._l(t.subscribers,(function(e){return a("tr",{key:e.id},[a("td",[t._v(t._s(e.id))]),a("td",[t._v(t._s(e.email))]),a("td",[t._v(t._s(e.name))]),a("td",[t._v(t._s(e.state))]),a("td",[a("router-link",{staticClass:"btn btn-primary",attrs:{to:{name:"Edit",params:{id:e.id}}}},[t._v("Edit")])],1),a("td",[a("button",{staticClass:"btn btn-danger",on:{click:function(a){return t.deleteSubscriber(e.id)}}},[t._v("Delete")])])])})),0)])])},P=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("thead",[a("tr",[a("td",[t._v("ID")]),a("td",[t._v("Email")]),a("td",[t._v("Name")]),a("td",[t._v("State")]),a("td",[t._v("Actions")]),a("td")])])}],F={data:function(){return{subscribers:[]}},created:function(){this.fetchSubscribers()},methods:{fetchSubscribers:function(){var t=this,e="http://localhost/api/subscriber/read.php";this.axios.post(e).then((function(e){t.subscribers=e.data}))},deleteSubscriber:function(t){var e={id:t},a="http://localhost/api/subscriber/delete.php";this.axios.post(a,e)}}},A=F,D=Object(m["a"])(A,O,P,!1,null,null,null),I=D.exports;a("ab8b"),a("a5d8");s["a"].use(r["a"]),s["a"].use(n.a,o.a),s["a"].config.productionTip=!1;var T=[{name:"Create",path:"/create",component:w},{name:"Edit",path:"/edit",component:j},{name:"Index",path:"/index",component:I}],U=new r["a"]({mode:"history",routes:T});U.beforeResolve((function(t,e,a){t.name&&c.a.start(),a()})),U.afterEach((function(){c.a.done()})),new s["a"]({render:function(t){return t(h)},router:U}).$mount("#app")},"85ec":function(t,e,a){}});
//# sourceMappingURL=app.4c5944ca.js.map