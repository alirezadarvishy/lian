jQuery(document).ready(function(){
  jQuery('.lian-overlay-options').hide();

  jQuery( ".lian-options .lian-options-sidebar ul li" ).each(function(index) {
    jQuery(this).on("click", function(){
      jQuery(".lian-options .lian-options-sidebar ul li").removeClass("active");
      jQuery(".lian-options .lian-options-content ul li").removeClass("active");
      jQuery(this).addClass("active");
      var nthchild = index + 1;
      jQuery(".lian-options .lian-options-content ul li").hide();
      jQuery(".lian-options .lian-options-content ul li:nth-child("+nthchild+")").show();
    });
  });

  // Define a variable lianMedia


  var lianMedia;

  jQuery('.lian-upload').on('click',function(e) {
    var _this = jQuery(this);
    e.preventDefault();
    // If the upload object has already been created, reopen the dialog
  if (lianMedia) {
      lianMedia.open();
      return;
    }
    // Extend the wp.media object
    lianMedia = wp.media({
      title: 'Insert Logo',
      library : {
        type : 'image'
      },
      button: {
        text: 'Use this image'
      },
      multiple: false
    });
    // When a file is selected, grab the URL and set it as the text field's value
    lianMedia.on('select', function() {
      var attachment = lianMedia.state().get('selection').first().toJSON();
      jQuery(_this).parent().find('input[type="url"]').val(attachment.url);
    });
    // Open the upload dialog
    lianMedia.open();
  });


  jQuery('.lian-color').wpColorPicker();


  jQuery(".lian-tabs-list > div").on('click',function(){
     var tabid = jQuery(this).data('tabid');
     jQuery(this).parent().find('div').removeClass("active");
     jQuery(this).parent().parent().find(".lian-tab").hide();
     jQuery(this).parent().parent().find('#'+tabid).show();
     jQuery(this).addClass("active");

  });


  // Select Options
  jQuery('.lian-wrap select').select2({templateResult: setFontBasedText, dropdownCssClass : "lian-loadfont" });

  jQuery(document).on('mouseover','.lian-loadfont .select2-results__option',function(){
    let fontName = jQuery(this).text();
    let type = jQuery(this).data('type');
    if(type == 'googlefonts')
      jQuery('head').append('<link href="https://fonts.googleapis.com/css?family='+fontName+':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" type="text/css"></link>');
  });

});



jQuery(document).on("submit", ".lian-wrap form[action='options.php']", function(event) {
  var btn = jQuery(document.activeElement);
  name =  btn.attr("name");
  if(name == "submit"){
    jQuery('.lian-save').show();
    jQuery('.lian-save .doing').show();
    event.preventDefault();
    var settings =  jQuery(this).serialize();
    jQuery.post( 'options.php', settings ).error(
      function() {
        jQuery('.lian-save .doing').hide();
        jQuery('.lian-save .fail').show();
        setTimeout(function(){
          jQuery('.lian-save .fail').hide();
          jQuery('.lian-save').hide();
        }, 1500);
      }).success( function() {
        jQuery('.lian-save .doing').hide();
        jQuery('.lian-save .succ').show();
        setTimeout(function(){
          jQuery('.lian-save .succ').hide();
          jQuery('.lian-save').hide();
        }, 1500);
      });
      return false;
  }
});


function setFontBasedText(data, container){
  if (data.element){
      jQuery(container).css('font-family', jQuery(data.element).text());
      jQuery(container).attr('data-type', jQuery(data.element).data('type'));
  }
  return data.text;
}

// Create new post type
function lian_create_new_post(element,type){
  var title = jQuery(element).parent().find('input').val();
  var data_items = {"action":"lian_create_new_post","sec":ajax_nonce,"type":type,"title":title};
  jQuery.ajax({
    url : ajax_url,
    type : 'post',
    data : data_items,
    success : function( url ) {
      window.location.replace(url);
    },
    fail : function( err ) {}
  });
}

// Remove Post
function lian_remove_post(post_id){

  var data_items = {"action":"lian_remove_post","sec":ajax_nonce,"post_id":post_id};

  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Yes',
    denyButtonText: `Cancel`,
    showLoaderOnConfirm: true,
    icon: 'warning',
    confirmButtonColor: '#3d518c',
    denyButtonColor:'#fff',
    denyButtonTextColor:'#3d518c',
    customClass: {
      container: 'swal-question',
    }
  }).then((result) => {

    if (result.isConfirmed) {
      jQuery.ajax({
        url : ajax_url,
        type : 'post',
        data : data_items,
        success : function( the_id ) {
          Swal.fire({
            icon: 'success',
            title: 'Done!',
            confirmButtonColor: '#3d518c',
            customClass: {
              container: 'swal-question',
            }
          });
          jQuery('#post'+the_id).remove();
        },
        fail : function( err ) {}
      });
    }
  })
 
}

// Register License
function lian_register_license(){

  fetch(`/wp-json/api/v1/register?license=${jQuery("#licenseKey").val()}&domain=${encodeURI(jQuery("#licenseDomain").val())}`)
  .then(response => {
    if(response.ok){
      return response.json();
    }else{
      throw new Error(response.statusText)
    }
  }).then((data) =>{
    if(data.status == "success"){
      var data_items = {"action":"lian_register_license","sec":ajax_nonce,"license":jQuery("#licenseKey").val()};
      jQuery.ajax({
        url : ajax_url,
        type : 'post',
        data : data_items,
        success : function( response ) {
          if(response === "success"){
            Swal.fire({
              text: data.msg,
              icon: data.status,
            }).then((result) => {
              location.reload();
            });
          }else{
            Swal.fire({
              text: "Please contect to support. There is an issue with registering the license.",
              icon: data.status,
            });
          }
        },
        fail : function( err ) {}
      });
    }else{
      Swal.fire({
        text: data.msg,
        icon: data.status,
      });
    }
  });

  return false;
}