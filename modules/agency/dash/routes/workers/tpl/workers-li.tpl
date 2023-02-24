<li onclick="modalChannelData('.uk-modal-full','#account_id#')">
    <div class="uk-flex uk-flex-between">
        <div>
            #account_name# #account_lastname# <br>
            #account_email# <br>
            #account_phone#
        </div>
        <div>
            <button type="button" class="uk-icon-button" uk-icon="pencil" onclick="workerEdit('#account_id#')"></button>
            <button type="button" class="uk-icon-button" uk-icon="trash" onclick="workerDelet('#account_id#')"></button>
        </div>
    </div>							
</li>
