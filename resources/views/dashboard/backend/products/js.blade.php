
    <script>

        // ======================================== Add size =========================================================
        $(document).on("click" , ".add-input-value-size", function(e){
            e.preventDefault();
            $(".main-value-size").append(
                `
                    <div class="delete-row col-lg-12 row align-items-center">

                        <x-forms col="4" main="main-value-size" label="{{ __('models.size_ar') }}" name="size_ar[]"/>
                        <x-forms col="4" main="main-value-size" label="{{ __('models.size_en') }}" name="size_en[]"/>
                        <x-forms col="2" main="main-value-size" label="{{ __('models.code_size') }}" name="code_size[]"/>



                        <div class="col-md-2 col-12 mb-3 mt-4">

                            <div>

                                <button class="btn btn-danger delelte-item-size"><i class="mdi mdi-trash-can-outline"></i><button>
                            </div>


                        </div>


                    </div>



                `
            )

        });

        $(document).on('click' , ".delelte-item-size" , function(){
            $(this).closest(".delete-row").remove();
        })
        // ======================================== Add Color =========================================================
        $(document).on("click" , ".add-input-value-color", function(e){
            e.preventDefault();
            $(".main-value-color").append(
                `
                    <div class="delete-row col-lg-12 row align-items-center">

                        <x-forms col="4" main="main-value-color" label="{{ __('models.color_ar') }}" name="color_ar[]"/>
                        <x-forms col="4" main="main-value-color" label="{{ __('models.color_en') }}" name="color_en[]"/>
                        <x-forms col="2" main="main-value-color" label="{{ __('models.code_color') }}" name="code_color[]"/>


                        <div class="col-md-2 col-12 mb-3 mt-4">

                            <div>

                                <button class="btn btn-danger delelte-item-color"><i class="mdi mdi-trash-can-outline"></i><button>
                            </div>


                        </div>


                    </div>



                `
            )

        });

        $(document).on('click' , ".delelte-item-color" , function(){
            $(this).closest(".delete-row").remove();
        })


    </script>


