<h3 class="font-normal text-xl px-3 py-1">Invite a member</h3>
@include('errors',['bag'=>'invitations'])
<div class="invite-user flex px-3 items-center justify-between pt-1 pb-3">
    <form
        action="{{route('invite-member',$project->sub_url)}}"
        method="POST"
        class="w-full"
    >
        @csrf
        <input
            type="email"
            name="email"
            id=""
            class="border border-gray-300 mb-2 w-full rounded-lg px-2 py-2 block"
            placeholder="Invitee's email address"
            required
        />
        <button
            type="submit"
            class="bg-indigo-400 w-full rounded-full text-white py-1 uppercase font-semibold"
        >
            Invite
        </button>
    </form>
</div>
