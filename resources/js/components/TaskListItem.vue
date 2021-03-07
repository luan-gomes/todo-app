<template>
    <div class="">
        <input
            class="form-check-input"
            type="checkbox"
            v-model="task.completd"
            id="flexCheckDefault"
        />
    </div>
</template>

<script>
export default {
    props: ["task"]
};
</script>
