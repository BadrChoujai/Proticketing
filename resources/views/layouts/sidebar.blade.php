

<div id="layoutSidenav_nav">
    <nav class=" sb-sidenav accordion sb-sidenav-primary " id="sidenavAccordion" style="border-radius:10px; background-color:white; margin-left:5px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); margin-top:20px;">
        <div class="sb-sidenav-menu">
            <div class="nav" style="overflow: hidden">
                <button type="button" style=" border: none; margin-left:-90px; margin-top:10px;" onclick="window.location='/home'" class="btn btn-outline-dark"><i class="fas fa-tachometer-alt"></i> Dashboard</button>
                <button type="button" style=" border: none; margin-left:-120px; margin-top:10px;" onclick="window.location='/tickets'" class="btn btn-outline-dark"><i class="fas fa-ticket-alt fa-fw"></i> Tickets</button>
                @if(hasRole('admin'))
                    <button type="button" style=" border: none; margin-left:-130px; margin-top:10px;" onclick="window.location='/roles'" class="btn btn-outline-dark"><i class="fas fa-user-tag fa-fw"></i> Roles</button>
                @endif
                @if(hasRole('admin'))
                <button type="button" style=" border: none; margin-left:-90px; margin-top:10px;" onclick="window.location='/permissions'" class="btn btn-outline-dark"><i class="fas fa-users-cog fa-fw"></i> Permissions</button>
                @endif
                    @if(hasRole('admin'))
                <button type="button" style=" border: none; margin-left:-110px; margin-top:10px;" onclick="window.location='/priorities'" class="btn btn-outline-dark"><i class="fas fa-star fa-fw"></i> Priorities</button>
                @endif
                @if(hasRole('admin'))
                <button type="button" style=" border: none; margin-left:-130px; margin-top:10px;" onclick="window.location='/cities'" class="btn btn-outline-dark"><i class="fas fa-city fa-fw"></i> Cities</button>
                @endif
                @if(hasRole('admin'))
                <button type="button" style=" border: none; margin-left:-100px; margin-top:10px;" onclick="window.location='/categories'" class="btn btn-outline-dark"><i class="fas fa-list-alt fa-fw"></i> Categories</button>
                @endif
                @if(hasRole('admin'))
                
                <button type="button" style=" border: none; margin-left:-120px; margin-top:10px;" onclick="window.location='/statuses'" class="btn btn-outline-dark"><i class="fas fa-thermometer-three-quarters fa-fw"></i> Statuses</button>
                @endif
                @if(hasRole('admin'))
                <button type="button" style=" border: none; margin-left:-140px; margin-top:10px;" onclick="window.location='/users'" class="btn btn-outline-dark"><i class="fas fa-users fa-fw"></i> Users</button>
                @endif
                <button type="button" style=" border: none; margin-left:-100px; margin-top:10px;" onclick="window.location='/comments'" class="btn btn-outline-dark"><i class="fas fa-comments fa-fw"></i> Comments</button>
            </div>
        </div>
        <div class="sb-sidenav-footer">
        </div>
    </nav>
</div>
