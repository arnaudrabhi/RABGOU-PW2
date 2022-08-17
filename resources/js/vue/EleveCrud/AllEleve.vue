<template>
    <div>
        <h3 class="text-center">All Posts</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="eleve in posts" :key="eleve.id">
                <td>{{ eleve.id }}</td>
                <td>{{ eleve.title }}</td>
                <td>{{ eleve.description }}</td>
                <td>{{ eleve.created_at }}</td>
                <td>{{ eleve.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: eleve.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deletePost(eleve.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: []
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/posts')
            .then(response => {
                this.posts = response.data;
            });
    },
    methods: {
        deletePost(id) {
            this.axios
                .delete(`http://localhost:8000/api/eleve/delete/${id}`)
                .then(response => {
                    let i = this.posts.map(item => item.id).indexOf(id); // find index of object
                    this.posts.splice(i, 1)
                });
        }
    }
}
</script>
