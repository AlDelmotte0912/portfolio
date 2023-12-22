<template>
    <div class="backdrop"  @click.self="closeModal">
        <div class="modal" :class="{sale: theme === 'sale'}">
            <slot>default slot</slot>
            <div class="actions">
                <slot name="links"></slot>
                <slot name="thanks"></slot>
            </div>
        </div>

    </div>
</template>

<script>
export default {
props : ['theme'],
methods: {
    closeModal(){
        this.$emit('close')
    },
}
}
</script>

<style>    
/*style scoped permet quenle style ne s'applique que pour ce component */
.modal{
    width: 400px;
    padding: 20px;
    margin: 100px auto;
    background: white;
    border-radius: 10px;
}

.backdrop{
    top:0;
    position:fixed;
    background: rgba(0, 0, 0, 0.5);
    width: 100%;
    height: 100%;
}

.modal h1 {
    color:aqua;
    border: none;
    padding:0;
}
.modal p {
    font-style:normal;
}
.modal.sale {
    background: crimson;
    color: white;
}
.modal.sale h1 {
    color: white;
}

.modal .actions {
    text-align: center;
    margin: 30px 0 10px 0;
}
.modal .actions a {
    color: black;
    padding: 8px;
    text-decoration: none;
    border: 1px solid #eee;
    border-radius: 4px;
    margin: 10px;
}
.modal.sale .actions {
    color:white;
}
.modal .sale .actions {
    color: #eee;
}
</style>