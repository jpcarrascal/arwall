<?php
$data = array_map('str_getcsv', file('data.csv'));
?>
<html>
  <head>
    
    <script type="text/javascript">
      var appInsights=window.appInsights||function(a){
      function b(a){c[a]=function(){var b=arguments;c.queue.push(function(){c[a].apply(c,b)})}}var c={config:a},d=document,e=window;setTimeout(function(){var b=d.createElement("script");b.src=a.url||"https://az416426.vo.msecnd.net/scripts/a/ai.0.js",d.getElementsByTagName("script")[0].parentNode.appendChild(b)});try{c.cookie=d.cookie}catch(a){}c.queue=[];for(var f=["Event","Exception","Metric","PageView","Trace","Dependency"];f.length;)b("track"+f.pop());if(b("setAuthenticatedUserContext"),b("clearAuthenticatedUserContext"),b("startTrackEvent"),b("stopTrackEvent"),b("startTrackPage"),b("stopTrackPage"),b("flush"),!a.disableExceptionTracking){f="onerror",b("_"+f);var g=e[f];e[f]=function(a,b,d,e,h){var i=g&&g(a,b,d,e,h);return!0!==i&&c["_"+f](a,b,d,e,h),i}}return c
      }({
          instrumentationKey:"77ecb372-b7ea-46b0-b4ba-590434660995"
      });
      
      window.appInsights=appInsights,appInsights.queue&&0===appInsights.queue.length&&appInsights.trackPageView();
    </script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-15242862-8"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-15242862-8');
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://aframe.io/releases/0.7.0/aframe.min.js"></script>
    <script src="../build/aframe-ar-hackedJP2.js"></script>
    <script>
      $( document ).ready(function() {

      });
    </script>
  </head>
  <body>
    
    <a-scene embedded artoolkit='sourceType: webcam; detectionMode: mono_and_matrix; matrixCodeType: 3x3;' embedded>
      <?php for($i=0; $i<count($data); $i++): ?>
        <a-marker type='barcode' value='<?php echo $data[$i][0]; ?>'>
            <a-entity
              rotation="-90 0 0"
              position="<?php echo ($i<32?("0 0 -1.5"):("2 0 -1.5"))?>"
              geometry="primitive: plane; width: 4; height: 3;"
              material="color: <?php echo ($i<32?("#7be8ff"):("#FFFFA5"))?>">
            </a-entity>
            
            <a-entity
              rotation="-90 0 0"
              position="<?php echo ($i<32?("0 0 -1.9"):("2 0 -1.4"))?>"
              text="color: #000; align: center; wrapCount: 25; zOffset: 0.23; baseline: center; transparent: true;
                 width: 3.5; height: 2.5;
                 value: <?php echo $data[$i][1]; ?>">
            </a-entity> 
  
       <?php if ($i<32): ?>
            <a-triangle color="#7be8ff"
              rotation="-90 0 -180"
              position="-1.2 0 0"
              vertexA="0 0 0" vertexB="-0.2 1 0" vertexC="1 1 0" >
            </a-triangle>
        <?php endif; ?>
  
        </a-marker>
      <?php endfor; ?>

      <a-entity camera></a-entity>
    </a-scene>
  
  </body>
</html>