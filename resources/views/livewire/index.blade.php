<form>
@foreach($users as $index => $user)
<div  wire:key="users-{{ $index }}">
	<div>
		<label>Name</label>
	<input type="text" wire:model="users.{{ $index }}.name">
	</div>
	<div>
		<label>Name</label>
		<input type="text" wire:model="users.{{ $index }}.settings.key">
	</div>
</div>
@endforeach
@foreach($rooms as $index => $room)
		<div wire:key="rooms-{{ $index }}">
			<label>Room</label>
			<input type="number" wire:model="rooms.{{ $index }}">
		</div>
	@endforeach
</form>
