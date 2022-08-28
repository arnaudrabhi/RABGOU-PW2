<template>
    <select class="form-select" :value="value" @input="$emit('update:value', $event.target.value)">
        <option v-for="value in values" :key="value.id" :value="value.id">{{ value.nom || value.libelle }}</option>
    </select>
</template>
<script>
export default {
    props: ['values', 'value'],
    emits: ['update:value']
}
</script>
