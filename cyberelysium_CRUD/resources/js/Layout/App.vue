<template>
    <div>
        <Navbar/>

        <slot name="content"/>

        <slot name="modal"/>
    </div>
</template>

<script>
import {defineComponent} from "vue";
import Navbar from "@\Components\Main\Navbar.vue"

export default defineComponent ({
    components: {Navbar}
})

</script>

<style lang="scss" scoped></style>
