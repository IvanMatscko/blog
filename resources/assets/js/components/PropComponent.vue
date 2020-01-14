<template>
    <div class="container">
        <div class="row">
          <table>
            <thead>
                <tr>
                  <th>Название</th>
                  <th>URL</th>
                </tr>
            </thead>
            <tbody>
              <tr v-for="url in urldata">
                <td>{{url.title}}</td>
                <td>{{url.url}}</td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
          'urldata'
        ],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
