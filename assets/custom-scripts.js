$= jQuery;

jQuery(document).ready(function(){
  console.log('JS & JQuery loaded :)');

  $('.show-more').click(function(){
    var button = $(this);
    var data = {
      'action': 'loadmore',
      'query': load_more.query,
      'page': load_more.current_page
    }

    $.ajax({
      url: load_more.ajax_url,
      type: 'POST',
      data: data,
      beforeSend: function(xhr){
        button.text('Loading...')
      },
      success: function(data){
        if(data){
          button.text('Show More');
          console.log(data);
          $('.card-deck').append(data);
          load_more.current_page++;

          if(load_more.current_page == load_more.max_page){
            button.remove();
          }
        } else{
          button.remove();
        }
      },
      error: function(error){
        console.log(error);
        console.log('Something went wrong');
      }
    });

  });

});
