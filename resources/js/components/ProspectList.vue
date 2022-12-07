<template>
    <tbody>
        <tr>
        <td>{{$prospect->notes}}</td>
        <td>{{$prospect->company}}</td>
        <td>{{$prospect->address}}</td>
        <td>{{$prospect->phone_one}}</td>
        <td>{{$prospect->phone_two}}</td>
        <td>{{$prospect->email}}</td>
        <td>{{$prospect->web_url}}</td>
        <td>{{$prospect->contact}}</td>
        <td>{{$prospect->position}}</td>
        <td>{{$prospect->pretty_created}}</td>
        <td>

            <a href="{{route('admin.prospects.show', $prospect->id)}}" class="btn btn-primary">View Prospect</a>
        </td>
        </tr>

    </tbody>
</template>

<script>
export default {
    name: "ProspectList.vue"
}
</script>

<style scoped>

</style>
