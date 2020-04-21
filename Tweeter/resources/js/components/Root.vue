<template>

  <div>
    <PartA/>
    <PartB/>
    <PartC/> 

  </div>
 
</template>

<script>
import PartA from './PartA'
import PartB from './PartB'
import PartC from './PartC'

export default {
    name: 'Root',
    components: {
        PartA,
        PartB,
        PartC
    },

     mounted() {
            console.log('');
        }


}
</script>

<style scoped>

</style>