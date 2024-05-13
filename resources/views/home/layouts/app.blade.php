<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('css/slicknav.min.cs')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('css/style.css')}}" type="text/css">
    <style>

            
        
    </style>
</head>

<body>



    @include('home.layouts.header')




    @section('home-main')
    @show 




   

  

      @include('home.layouts.footer')


    <!-- Js Plugins -->
    {{-- https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js --}}

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('js/mixitup.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
        <script>
          function updateQuantity(qty)
          {
              $('#rowId').val($(qty).data('rowid'));
              $('#quantity').val($(qty).val());
              $('#updateCartQty').submit();
          } 

          function removeItemFromCart(rowId)
          {
              $('#rowId_D').val(rowId);
              $('#deleteFromCart').submit();
          }  
          function clearCart()
          {
              $('#clearCart').submit();
          } 

          //short per page product

          $("#pagesize").on("change",function(){                    
                $("#size").val($("#pagesize option:selected").val());
                $("#frmFilter").submit(); 
            });

            $("#orderby").on("change",function(){                    
                $("#order").val($("#orderby option:selected").val());
                $("#orFilter").submit(); 
            });

          // wishlist Functions

            function addProductToWishlist(id,name,quantity,price){
        

                $.ajax({
                    type:'POST',
                    url:"{{route('wishlist.add')}}",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id:id,
                        name:name,
                        quantity:quantity,
                        price:price
                    },
                    success:function(data){

                        if(data.status == 200)
                         {
                               swal({
                                    title: "Done!",
                                    text: "This Product Added Your Wishlist!",
                                    icon: "success",
                                    button: "ok",
                                    });
                      
                        } 
                    }
                          
                });
            }


            //remove wishlist

        function removeFromWishlist(rowId)
          {
              $('#rowId_R').val(rowId);
              $('#deleteFromWishlist').submit();
          }  
        function clearWishlist()
          {
              $('#clearWishlist').submit();
          } 


        
      </script>



</body>

</html>