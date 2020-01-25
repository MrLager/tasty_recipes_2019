/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("content").style.marginLeft = "250px";
  }
  
  /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("content").style.marginLeft = "5%";
}

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;


$(document).ready(function () {
    var viewModel = {
        userName : ko.observable(),
        passWord : ko.observable(),
        loggedIn : ko.observable('Login'),
        register : ko.observable(true),
        commentvisability : ko.observable(false),
        userId : ko.observable(),
        userInfo : ko.observableArray(),
        commentEntered : ko.observable(),
        dishId : ko.observable(0),
        comments : ko.observableArray(),
        dropdownEnabled: ko.observable(false),
        elementRef : 0,
        showDropdownMobileMenu: ko.observable(false),
        showLoginForm : ko.observable(false),

        
        logginAction : function(data, event, mobile=false)
        {
            
            if(this.loggedIn() == "Log Out")
            {
                $.post("Logout");
                this.loggedIn("Login");
                this.register(true);
                this. commentvisability(false);
            }
            else if(mobile)
            {
                window.location.pathname = 'tasty/TastyRecipes/View/LoginPage'
            }
            else
            {
                this.showLoginForm(!this.showLoginForm());
            }
        },

        logIn : function()
        {
            $.post("Login", {"userName": ko.toJS(this.userName()), "pass": ko.toJS(this.passWord())}, function(data){
                viewModel.userInfo(JSON.parse(data));

                if(viewModel.userInfo()['logedIn']){
                    viewModel.loggedIn("Log Out");
                    viewModel.register(false);
                    viewModel. commentvisability(true);
                }
            });
            this.showLoginForm(!this.showLoginForm());
        },
  
        checkIfLoggedIn : function()
        {
            $.post("Login", function(data)
            {
                viewModel.userInfo(JSON.parse(data));
                if(viewModel.userInfo()['logedIn']){
                    viewModel.loggedIn("Log Out");
                    viewModel.register(false);
                    viewModel. commentvisability(true);
                }
            });
            
        },

        getComments : function(id)
        {
            $.post("GetAllComments",{"dishId": ko.toJS(id)}, function(data){
                data = JSON.parse(data);
                viewModel.comments(data);
            });
            
        },

        storeComment : function(event)
        {
    
            $.post("PostComment", ko.toJS({"comment":this.commentEntered(), "dishId": this.dishId()}), function(data){
                viewModel.comments.push(JSON.parse(data));
            
            
            });
            this.commentEntered('');
        },
        deleteComment : function()
        {
            viewModel.comments.remove(this);
            $.post("DeleteComment",{"commentId": this['comment_id']});

        },

        enableDropdown: function(data, evt, elem) {
            viewModel.elementRef = elem;
            this.dropdownEnabled(true);
        },
        disableDropdown40: function(data, evt) {
            var rect = viewModel.elementRef.getBoundingClientRect();
            var top = evt.clientY - rect.top;
            if(top<(rect.bottom))
                this.dropdownEnabled(false);
        },

        disableDropdown: function(data, evt) {
            var rect = viewModel.elementRef.getBoundingClientRect();
            var top = evt.clientY - rect.top;
            if(top<(rect.bottom))
                this.dropdownEnabled(false);
            if(top>(rect.top))
                this.dropdownEnabled(false);
        },

        getRecipe : function()
        {
            $.post("RecipePage",{"recipe_id": 0}, function(data){
                viewModel.comments.push(JSON.parse(data));
            
            
            });
            window.location.pathname = 'tasty/TastyRecipes/View/LoginPage'
        },
        
        showDropdownMobileMenuFunc : function()
        {
            this.showDropdownMobileMenu(!this.showDropdownMobileMenu())
        }
    };
    ko.applyBindings(viewModel);
    viewModel.checkIfLoggedIn();
    var sPath = window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1,sPath.lastIndexOf('/') + 11);
    var url = new URL(window.location.href);
    var id = url.searchParams.get("recipe_id");
    // var id = sPath.substring(sPath.lastIndexOf('/'));
    viewModel.dishId(id);
    if(sPage == "RecipePage"|| sPage == "PostComment")
    {
        viewModel.getComments(id);
    }
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("head").style.top = "0";
        } else {
            // viewModel.dropdownEnabled(false); //remove later
            document.getElementById("head").style.top = "-70px";
        }
        prevScrollpos = currentScrollPos;
    }
   
    
});

