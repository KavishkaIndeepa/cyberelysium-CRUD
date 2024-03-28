<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <Link class="navbar-brand" href="/">Nav bar</Link>
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        class="navbar-toggler" data-bs-target="#navbarSupportedContent"
                        data-bs-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <Link aria-current="page" class="nav-link active" href="/student">Student List
                            </Link>
                        </li>

                    </ul>
                    <span class="p-3 bg-blue-500 h-3 w-4">
                      <Link href="login">LogOut</Link>
                     </span>

                </div>
            </div>
        </nav>

    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";

export default {

    components: {
        Link
    }
}

</script>
<style></style>
