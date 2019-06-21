<!-- Navigation -->

  <?php

        $settings = DB::table('general_setting')->where('id', 1)->first();

        echo $settings->setting_1;

        if((\Request::route()->getName() == 'frontend.index'))
        {
        echo $settings->setting_3;
        }
        
  
  ?>


  