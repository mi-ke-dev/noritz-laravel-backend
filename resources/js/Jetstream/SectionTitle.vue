<template>
    <div class="md:flex justify-between items-center mb-7">
        <div class="mb-3 sm:mb-0">
            <h3 class="text-3xl font-bold leading-9">
                <slot name="title"></slot>
            </h3>

            <p class="text-sm">
                <slot name="description"></slot>
            </p>
        </div>
        <div>
            <slot name="buttons"></slot>
        </div>
    </div>
</template>
