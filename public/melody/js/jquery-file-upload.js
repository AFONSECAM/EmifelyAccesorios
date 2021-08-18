(function ($) {
  'use strict'; a
  if ($("#fileuploader").length) {
    $("#fileuploader").uploadFile({
      url: "/upload/product/{{$product}}/image",
      fileName: "myfile"
    });
  }
})(jQuery);