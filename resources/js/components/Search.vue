<template>
    <div>
        <input type="text" v-model="keywords">
        <div v-if="results.length > 0" class="row">
            <div v-for="job in results" class="col-sm-6 col-md-4 gallery">           
                <job class="animated fadeIn" :job="job"></job>
            </div>
        </div>
        
    </div>
</template>

<script>
import job from '../components/Job'
export default {
    components: {
                job
    },
    data() {
        return {
            keywords: null,
            results: []
        };
    },

    watch: {
        keywords(after, before) {
            this.fetch();
        }
    },

    methods: {
        fetch() {
            axios.get('/advance', { params: { keywords: this.keywords } })
                .then(response => this.results = response.data)
                .catch(error => {});
        }
    }
}
</script>

<style scoped>
        .card {
            cursor: pointer;
            margin-bottom: 8px;
        }
</style>