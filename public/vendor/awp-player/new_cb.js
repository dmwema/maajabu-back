



//############################################//
/* callbacks */
//############################################//

function awpSetupDone(instance, instanceName){
	/* called when component is ready to use public API. Returns player instance, sound id. */
	//console.log('awpSetupDone: ', instanceName);
}
function awpPlaylistEnd(instance, instanceName){
	/* called when current playlists reaches end. Returns player instance, sound id. */
	//console.log('awpPlaylistEnd: ');
}
function awpMediaStart(instance, instanceName, counter){
	/* called when media starts. Returns player instance, instanceName, media counter. */
	//console.log('awpMediaStart: ', counter);
}
function awpMediaPlay(instance, instanceName, counter){
	/* called when media is played. Returns player instance, instanceName, media counter. */
	//console.log('awpMediaPlay: ', instanceName);

	if(typeof awp_mediaArr != undefined && awp_mediaArr.length && awp_mediaArr.length > 1){
		var i, len = awp_mediaArr.length;
		for(i=0;i<len;i++){
			if(instance != awp_mediaArr[i].inst){
				awp_mediaArr[i].inst.checkMedia('pause');
			}
		}
	}
}
function awpMediaPause(instance, instanceName, counter){
	/* called when media is paused. Returns player instance, instanceName, media counter. */
	//console.log('awpMediaPause: ', instanceName);
}
function awpMediaEnd(instance, instanceName, counter){
	/* called when media ends. Returns player instance, instanceName, media counter. */
	//console.log('awpMediaEnd: ', counter);
}
function awpPlaylistStartLoad(instance, instanceName){
	/* called when playlist load starts. Returns player instance, instanceName. */
	//console.log('awpPlaylistStartLoad: ', instanceName);
}
function awpPlaylistEndLoad(instance, instanceName, playlistContent){
	/* called when playlist load ends. Returns player instance, instanceName. */
	//console.log('awpPlaylistEndLoad: ', instanceName);
}

function awpItemTriggered(instance, instanceName, counter){
	/* called when new sound is triggered. Returns player instance, instanceName, media counter. */
	//console.log('awpItemTriggered: ', instanceName, counter);

	var data = instance.getPlaylistData()[counter].data;

	if(instanceName == 'voicer1' || instanceName == 'voicer2' || instanceName == 'voicer3'){

		var playerThumb = instance.find('.awp-player-thumb'),
			thumb = data.thumb || data.thumbDefault;

		if(playerThumb.length && typeof thumb !== 'undefined'){
			var img = new Image();
			img.className = "awp-hidden";
			img.onload = function () {
			   this.className = "awp-visible";
			}
			img.src = thumb;
			playerThumb[0].appendChild(img);
		}
		instance.find('.awp-player-title').html(data.title);
		instance.find('.awp-player-artist').html(data.artist);
	}

	else if(instanceName == 'fixed_bottom3' || instanceName == 'wall2'){
		instance.find('.awp-player-title').html(instance.getTitle(instance.getActiveItemId()));
		if(data.description && !AWPUtils.isEmpty(data.description))instance.find('.awp-player-desc').html(data.description);
	}
}
function awpPlaylistItemEnabled(instance, instanceName, item, id){
	/* called on playlist item enable. Returns player instance, instanceName, playlist item, playlist item id (playlist items have data-id attributes starting from 0). */
	//console.log('awpPlaylistItemEnabled: ');
}
function awpPlaylistItemDisabled(instance, instanceName, item, id){
	/* called on playlist item disable. Returns player instance, instanceName, playlist item, playlist item id (playlist items have data-id attributes starting from 0). */
	//console.log('awpPlaylistItemDisabled: ');
}
function awpPlaylistItemClick(instance, instanceName, target, counter){
	/* called on playlist item click. Returns player instance, instanceName, playlist item (target), media counter. */
	//console.log('awpPlaylistItemClick: ', counter);
}
function awpPlaylistItemRollover(instance, instanceName, target, id){
	/* called on playlist item mouseenter. Returns player instance, instanceName, playlist item (target), playlist item id (playlist items have data-id attributes starting from 0). */
	//console.log('awpPlaylistItemRollover: ', id);
}
function awpPlaylistItemRollout(instance, instanceName, target, id, active){
	/* called on playlist item mouseleave. Returns player instance, instanceName, playlist item (target), playlist item id (playlist items have data-id attributes starting from 0), active (is active playlist item, boolean). */
	//console.log('awpPlaylistItemRollout: ', id);
}
function awpMediaEmpty(instance, instanceName){
	/* called when active media is removed from the playlist. Returns player instance, instanceName. */
	//console.log('awpMediaEmpty: ', instanceName);
}
function awpPlaylistEmpty(instance, instanceName, playlistContent){
	/* called when playlist becomes empty (no items in playlist after new playlist has been created or last playlist item removed from playlist, NOT after destroyPlaylist!). Returns player instance, instanceName. */
	//console.log('awpPlaylistEmpty: ', instanceName);
}
function awpCleanMedia(instance, instanceName){
	/* called when active media is destroyed. Returns player instance, instanceName. */
	//console.log('awpCleanMedia: ', instanceName);
}
function awpDestroyPlaylist(instance, instanceName, playlistContent){
	/* called when active playlist is destroyed. Returns player instance, instanceName. */
	//console.log('awpDestroyPlaylist: ', instanceName);
}
function awpVolumeChange(instance, instanceName, volume){
	/* called on volume change. Returns player instance, instanceName, volume. */
}
function awpFilterChange(instance, instanceName, playlistContent){
	/* called after filter playlist items. Returns player instance, instanceName. */
}


/* END PLAYER CALLBACKS */



