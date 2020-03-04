
    <template>
        <div class="card">
            <img class="card-img-top" :src="'/img/images.jpg'" :alt="job.title">
            <div class="card-body">
                <h5 class="card-title">{{job.name}}</h5>
                <p class="card-text">{{job.description}}</p>
                <p class="card-text">{{job.city_id}}</p>
            </div>
        </div>
    </template>

    <script>
        export default {
            name: "Job",
            props: ['job']
        }
    </script>

    <style scoped>
        .card {
            cursor: pointer;
            margin-bottom: 8px;
        }
    </style>