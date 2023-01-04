<template>
    <div class="msg" :class=" {'success-msg' : successprop, 'fail-msg': failprop }">

        <h4>
            {{ messageprop.toUpperCase() }}
        </h4>
    </div>
</template>

<script>
export default {
    props: ['messageprop', 'failprop', 'successprop']
}
</script>

<style scoped>
.msg {
    width: 100%;
    color: #fff;
    padding: 1rem .5rem;
}

.success-msg {
    background: #198754;
}
.fail-msg {
    background: #6a1a21;
}
</style>
