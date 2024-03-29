<template>

    <AppLayout>
        <template #content>

            <div class="container">
                <div class="col-lg-12 text-center mt-5">
                    <h2>Manage Students</h2>
                </div>
            </div>

            <div class="container col-lg-4">
                <div class="row">
                    <form @submit.prevent="studentStore">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input id="name" v-model="students_form.name" class="form-control" type="text">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Age</label>
                                <input id="age" v-model="students_form.age" class="form-control" name="age" type="text">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Submit Image</label>
                                <input id="image" class="form-control" name="image" type="file"
                                       @change="handleImageChange">
                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="container text-center mt-5">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Age</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(student, key) in student_list" :key="key">
                                <th scope="row">{{ key + 1 }}</th>
                                <td>{{ student.name }}</td>
                                <td><img :src="student.image" class="w-12 h-12 rounded"></td>
                                <td>{{ student.age }}</td>

                                <td>
                                    <span v-if="student.status === 0" class="badge bg-warning">Inactive</span>
                                    <span v-else class="badge bg-success">Active</span>
                                </td>
                                <td>
                                    <button class="btn btn-primary m-2"
                                            @click.prevent="editStudent(student.id)">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger m-2"
                                            @click.prevent="deleteStudent(student.id)">
                                        Delete
                                    </button>
                                    <button v-if="student.status === 0" class="btn btn-success m-2"
                                            @click.prevent="statusStudent(student.id)">
                                        Active
                                    </button>
                                    <button v-if="student.status === 1" class="btn btn-warning m-2"
                                            @click.prevent="statusStudent(student.id)">
                                        Inactive
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div id="editStudent" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Update Student</h1>
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="studentUpdate">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input id="name" v-model="students_Updateform.name" class="form-control"
                                               type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Age</label>
                                        <input id="age" v-model="students_Updateform.age" class="form-control"
                                               name="age" type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Submit Image</label>
                                        <input id="image" class="form-control" name="image" type="file"
                                               @change="handleImageChange">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </template>

    </AppLayout>

</template>


<script>

import AppLayout from '@/Layouts/App.vue'
import axios from "axios";

export default{
    components: {
        AppLayout
    },
    data(){
        return {
            students_form: {
                name: '',
                age: '',
                image: ''
            },
            students_Updateform: {
                name: '',
                age: '',
                image: ''
            },
            student_list: []
        }
    },


    befoMount(){
        this.getStudent()
    },
    methods: {
        handleImageChange(event) {
            const file = event.target.files[0];
            this.students_form.image = file;
        },
        async getStudent() {
            const stu = (await axios.get(route('student.list'))).data
            this.student_list = stu
        },
        async studentStore() {
            await axios.post(route('student.store'), this.students_form)
            this.getStudent()
            this.students_form.name = ''
            this.students_form.age = ''
        },
        async deleteStudent(id) {
            await axios.delete(route('student.delete', id))
            this.getStudent()
        },
        async statusStudent(id) {
            await axios.get(route('student.status', id))
            this.getStudent()
        },
        async editStudent(id) {
            const stud = (await axios(route('student.get', id))).data
            this.students_Updateform = stud;
            $('#editStudent').modal('show')
        },
        async studentUpdate() {
            await axios.post(route('student.update', this.students_Updateform.id), this.students_Updateform)
            this.getStudent();
            $('#editStudent').modal('hide')
        }
    }

}


</script>
