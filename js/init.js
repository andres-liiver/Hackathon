/**
 * Created by Andres on 11.09.2015.
 */

function c(obj) {
    console.log(obj);
}

var pluginConf = {
    lang: 'et'
};
var swPlugin = new SignWisePlugin(pluginConf);

var homeVM = new homeViewModel();
var profileVM = new profileViewModel();
var contentVM = new contentViewModel();
//var chatVM = new chatViewModel();

$(function() {
    ko.applyBindings(homeVM, document.getElementById('home_page'));
    ko.applyBindings(profileVM, document.getElementById('profile_page'));
    ko.applyBindings(contentVM, document.getElementById('content_page'));
    //ko.applyBindings(chatVM, document.getElementById('chat_module'));

    //$.material.init();
    nav.run();
    //chatVM.init();
});