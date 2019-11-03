const San_Helpers = new San_Helper(this);
let baseurl = $('meta[name=baseurl]').attr("content");
let token = $('meta[name=csrf-token]').attr("content");
let loader = '<div class="fa-3x" id="custom_loader_"><i class="fa fa-spinner fa-pulse"></i></div>';
let spinner = '<i class="fa fa-spinner fa-spin" style="font-size:15px"></i>';
window.axios = axios;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = token;