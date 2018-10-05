<nav class="navbar <?php echo $navbar_style; ?> cm-navbar">
  <?php
  if ($oscTemplate->hasBlocks('navbar_modules_home')) {
    echo '<div class="navbar-header">' . PHP_EOL;
    echo $oscTemplate->getBlocks('navbar_modules_home');
    echo '</div>' . PHP_EOL;
  }
  ?>      
  <div class="collapse navbar-collapse" id="collapseCoreNav">
    <?php
    if ($oscTemplate->hasBlocks('navbar_modules_left')) {
      echo '<ul class="navbar-nav mr-auto">' . PHP_EOL;
      echo $oscTemplate->getBlocks('navbar_modules_left');
      echo '</ul>' . PHP_EOL;
    }
    if ($oscTemplate->hasBlocks('navbar_modules_right')) {
      echo '<ul class="navbar-nav ml-auto">' . PHP_EOL;
      echo $oscTemplate->getBlocks('navbar_modules_right');
      echo '</ul>' . PHP_EOL;
    }    
    ?>
  </div>
</nav>

<?php
/*
  Copyright (c) 2018, G Burton
  All rights reserved.

  Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

  1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

  2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

  3. Neither the name of the copyright holder nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/
?>
