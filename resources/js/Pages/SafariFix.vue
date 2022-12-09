<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-8 text-2xl">
                Safari Fix
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

    export default {
        components: {
            JetApplicationLogo,
        },
        mounted() {
            document.cookie = 'safari_cookie_fix=fixed; path=/;  expires=Fri, 31 Dec 9999 23:59:58 GMT';

            window.location = "https://nori.nomad.site/return-and-claims";
            // if (window.location.href.indexOf('verbose') > -1) { // you should remove or comment this line
            //     alert('safari fix has been applied'); // you should remove or comment this line
            //     setTimeout(window.location.replace(document.referrer), 2000); // you should remove or comment this line
            // } else { // you should remove or comment this line
            //     window.location.replace(document.referrer) //>>>>>>> leave this line ONLY <<<<<<<<
            // } // you should remove or comment this line
        }
    }
</script>
