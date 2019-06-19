<!-- Navigation -->

  <?php

        $settings = DB::table('general_setting')->where('id', 1)->first();

        if((\Request::route()->getName() == 'frontend.index'))
        {
        echo $settings->setting_4;
        }
        else
        {
          echo $settings->setting_2;
        }
  
  ?>


  