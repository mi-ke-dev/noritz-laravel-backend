<div class="w-row">
    <div class="w-col w-col-2">
        <div class="div-block-10">
        </div>
    </div>

    <div class="column w-col w-col-10">
       

        
    </div>


    <?php if((!empty($commercial_heaters) && count($commercial_heaters)>0  && $perPage>3) || (!empty($residental_heaters) && count($residental_heaters)>0 && $perPage>3)): ?>
    <script>
        window.onscroll = function(ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                console.log(window.innerHeight + window.scrollY);
                setTimeout( function(){
                   window.livewire.emit('load-more');
                }  , 1500 );
            }
        };
    </script>
    <?php endif; ?>

    <div wire:loading style="width:100%;">
        <div id="filter_loader">
            <div class="filter-spinner"></div>
        </div>
    </div>

     

</div>


<style>
#loader {
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999;
    margin-top: 60px;
}
.nb-spinner {
	width: 75px;
	height: 75px;
	margin: 0;
	background: transparent;
	border-top: 4px solid #cf4d4d;
	border-right: 4px solid transparent;
	border-radius: 50%;
	-webkit-animation: 1s spin linear infinite;
	animation: 1s spin linear infinite;
}
#filter_loader {
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    z-index: 999;
    background: #ffffffb5;
}
.filter-spinner {
	width: 75px;
	height: 75px;
	margin: 0;
	background: transparent;
    border-top: 4px solid #cf4d4d;
	border-right: 4px solid transparent;
	border-radius: 50%;
	-webkit-animation: 1s spin linear infinite;
	animation: 1s spin linear infinite;
}

.tnames {
    color: #000;
}
.tnames:hover {
    color: #ff5959;
}
strong.no_products {
    font-size: 18px;
    color: #ff5959;
    max-width: 87%;
    display: block;
}
</style>
<?php /**PATH D:\xampp\htdocs\noritz-laravel-backend\resources\views/domain/website/products/livewire/sizing.blade.php ENDPATH**/ ?>