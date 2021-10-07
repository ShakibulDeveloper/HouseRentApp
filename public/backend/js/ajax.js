$(document).ready(function(){

  /**
   * STATE_CITY::START
   */
  $('#country').change(function(){
    var country_value = $(this).val();
    var url = $('#state_city_url').val();

     $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
     });

     $.ajax({
      type:'get',
      url: url,
      cache: false,
      beforeSend: function(){
        $('.data-loading').show();
      },
      data: {catch_id: country_value},
      success: function (data) {
        $('.data-loading').hide();
        var html_one = "";
        var html_two = "";

        $("#state").empty();
        $("#city").empty();

        data.states.forEach(function (item, index){
          html_one += '<option value="'+item.id+'">'+item.name+'</option>';
        });

        data.cities.forEach(function (item, index){
          html_two += '<option value="'+item.id+'">'+item.name+'</option>';
        });

        $("#state").append(html_one);
        $("#city").append(html_two);
      }
     });
  });
  /**
   * STATE_CITY::END
   */
});
