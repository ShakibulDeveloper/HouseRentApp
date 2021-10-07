

"use strict"

    /**
     * MODAL JS
     */

    //show the modal in this function
    function quickView(url) {
        $('#modal_backdrop').removeClass('d-none');
        $('#modal_backdrop').modal('show');
        $('#modal_backdrop').load(url);
    }

    //get order id for follow up
    function getOrderID(id)
    {
      var Order_id = id;
      $('#order_id').val(Order_id);
    }

    /**
     * CLOSE MODAL
     */

    $('.close').on('click',function(){
        $('#modal_backdrop').addClass('d-none');
    });

    /**
     * PRODUCT FILTER
     */

    $('#product_filter input').on('click',function(){
        $('#product_filter').submit();
    });

    /**SUMMERNOTE */
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
        });
    });

    /**
     * stock input
     */

    $('.stock-open').on('click',function(){
        $('.stock-show').toggleClass('d-none');
    });

    /**
     * PRODUCT FILTER
     */

    $('#product_filter input').on('click',function(){
    $('#product_filter').submit();
    });

    /**
     * Order Follow Up
     */

    $('.follow-up-btn').click(function(){

    });

    /**
     * FILE POND
     */

    /**
     * For image preview use this link
     * FilePond.registerPlugin(FilePondPluginImagePreview);
     */

      $('.my-pond').filepond();

//translate in one click
function copy() {
    $("#tranlation-table > tbody  > tr").each(function (index, tr) {
        $(tr).find(".value").val($(tr).find(".key").text());
    });
}
