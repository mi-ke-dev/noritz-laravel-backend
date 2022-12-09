<template>
    <div class="min-h-screen">       
        <HeaderNav></HeaderNav>
        <main>
            <slot></slot>
        </main>
        <Footer ></Footer>
    </div>
</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import HeaderNav from '@/Partials/HeaderNav'
    import Footer from '@/Partials/Footer'

    export default {
        components: {
            JetApplicationMark,
            JetDropdown,
            JetDropdownLink,
            Footer,
            HeaderNav
        },

        data() {
            return {                
            }
        },

        methods: {
            logout() {
                axios.post(route('logout').url()).then(response => {
                    window.location = '/';
                })
            },
        }
    }
</script>

<style>
@import 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css';
@font-face {
    font-family: 'Lato-Regular';
    src: url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Regular.eot');
    src: local('☺'), url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Regular.woff') format('woff'), 
    url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Regular.ttf') format('truetype'), 
    url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Regular.svg') format('svg');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'Lato-Bold';
    src: url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Bold.eot');
    src: local('☺'), url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Bold.woff') format('woff'), 
    url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Bold.ttf') format('truetype'), 
    url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Bold.svg') format('svg');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'Lato-Black';
    src: url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Black.eot');
    src: local('☺'), url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Black.woff') format('woff'), 
    url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Black.ttf') format('truetype'), 
    url('/vendor/ipsfacademy-core/assets-front/fonts/Lato-Black.svg') format('svg');
    font-weight: normal;
    font-style: normal;
}
body.font-sans{
    font-family: 'Lato-Regular';
}
body{
    font-family: 'Lato-Regular';
    font-size: 16px;
    line-height: 21px;
    color: #4a4a4a;
}
.font-medium{
    font-family: 'Lato-Bold';
}
.font-bold{
    font-family: 'Lato-Black';
}
.hover\:text-yellow:hover {
    color: #e78c40;
}
.text-yellow {
    color: #e78c40;
}
.bg-yellow {
    background-color: #e78c40;
}
.bg-blue {
    background-color: #0096d1;
}
.text-blue {
    color: #0096d1;
}
.font-lato{
    font-family: 'Lato-Regular';
}
.bg-footer {
    background-color: #404041;
}
@media (min-width: 1024px){
    .max-w-355{
        max-width:355px;
    }
}
input:checked + svg {
  	display: block;
}
input:checked + svg {
    display: block;
    padding: 2px;
    background: #6b7280;
    border-radius:2px;
}
.hover\:bg-blue:hover {
    background-color: #0096d1;
}
@media (min-width: 640px){
    .max-w-145{
        max-width: 145px;
    }
}
@media (min-width: 1280px){
    .max-w-300{
        max-width: 300px;
    }
}
.border-yellow {
    border-color: #e78c40;
}
.hover\:bg-yellow:hover {
    background-color: #e78c40;
}
</style>