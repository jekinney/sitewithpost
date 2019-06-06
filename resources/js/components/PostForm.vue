<template>
	<section class="card">
        <header class="card-header">
            <h1 class="card-title">{{ title }}</h1>
        </header>

        <form :action="url" method="post" class="card-body">
        	<input type="hidden" name="_token" :value="token">
        	<input v-if="updating" type="hidden" name="_method" value="patch">

        	<div class="form-group">
        		<label for="title">Title</label>
        		<input type="text" v-model="title" id="title" class="form-control">
        	</div>

        </form>
    </section>
</template>

<script>
	export default {
		name: 'postform',
		props: ['data'],
		computed: {
			updated () {
				if ( this.data.length > 0 ) {
					return true;
				}
				return false;
			},
			title () {
				if ( this.data.length > 0 ) {
					return this.data.title;
				}
				return '';
			}
		}
	}
</script>