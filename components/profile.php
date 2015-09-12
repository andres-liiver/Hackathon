<div id="profile_page" data-bind="if: loaded, visible: nav.currentView.view() == view && loaded">
    <div class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav" style="width: 100%;">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="hidden" style="width: 100%;" class="select2 ajax"
                               data-bind="
                                select2: {
                                    minimumInputLength: 2,
                                    ajax: {
                                        url: 'modules/search.php',
                                        type: 'post',
                                        dataType: 'json',
                                        quietMillis: 200,
                                        data: function(term) {
                                            return {
                                                names: term,
                                                user_id: homeVM.user_data()['id']
                                            };
                                        },
                                        results: function(data) {
                                            if (!data) return { results: [] };

                                            return {
                                                results: data
                                            };
                                        }
                                    },
                                    formatResult: function (item) {
                                        return '<div style=\x22padding: 10px;\x22>' + item.text +
                                        '<i class=\x22glyphicon glyphicon-plus pull-right\x22></i>' + '</div>';
                                    },
                                    formatSelection: function (item) {
                                        $($element).select2('val', '');
                                        return '';
                                    },
                                    initSelection: function (element, callback) {
                                        callback(element.select2('data'));
                                    },
                                    escapeMarkup: function(m) { return m; }
                                },
                                event: { change: addFriend }
                            ">
                        </input>
                    </div><!-- /.col-lg-12 -->
                </div>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron jumbotronINFO">
            <div class="col-md-6">
                <img src="assets/images/Picture.png" class="img-thumbnail profilePicture">
            </div>
            <div class="col-md-3">
                <h5 class="profileDescription">NAME</h5>
                <h5 class="profileDescription">SEX</h5>
                <h5 class="profileDescription">DATE OF BIRTH</h5>
            </div>
            <div class="col-md-3">
                <h5 class="profileDescription2" data-bind="text: homeVM.user_data()['firstName'] + ' ' + homeVM.user_data()['lastName']"></h5>
                <h5 class="profileDescription2">SEX</h5>
                <h5 class="profileDescription2">DATE OF BIRTH</h5>
            </div>
            <div class="col-md-6">
                <br/><br/>
                <h3>Friends:</h3><br/>
                <table class="table table-bordered table-hover">
                    <tbody data-bind="foreach: friends">
                        <tr>
                            <td data-bind="text: name"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <hr>
        <div class="col-md-6">
            <h1 class="lead" id="description">DESCRIPTION</h1>
            <div class="jumbotron text-center">
                <h2 class="bio">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus dolore rem amet aut cum beatae illo nisi tenetur assumenda, dignissimos ratione. Ipsa deserunt aliquam voluptas, consectetur excepturi suscipit. Enim, consequuntur.</h2>
                <br/>
                <div class="btn btn-lg btn-success">Edit</div>
            </div>
        </div>

        <?php require('chat.php'); ?>
    </div> <!-- /container -->
</div>