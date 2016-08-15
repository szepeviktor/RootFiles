<?xml version="1.0" encoding="utf-8" ?>
<Autodiscover xmlns="http://schemas.microsoft.com/exchange/autodiscover/responseschema/2006">
    <Response xmlns="http://schemas.microsoft.com/exchange/autodiscover/outlook/responseschema/2006a">
        <User>
            <DisplayName>%%DisplayName%%</DisplayName>
        </User>
        <Account>
            <AccountType>email</AccountType>
            <Action>settings</Action>
            <Image>%%Image%%</Image>
            <ServiceHome>%%ServiceHome%%</ServiceHome>
            <Protocol>
                <Type>IMAP</Type>
                <Server>%%Server1%%</Server>
                <Port>%%Port1%%</Port>
                <LoginName>%%LoginName1%%</LoginName>
                <DomainRequired>off</DomainRequired>
                <DomainName></DomainName>
                <SPA>off</SPA>
                <SSL>%%SSL1%%</SSL>
                <AuthRequired>on</AuthRequired>
                <UsePOPAuth>off</UsePOPAuth>
            </Protocol>
            <Protocol>
                <Type>SMTP</Type>
                <Server>%%Server2%%</Server>
                <Port>%%Port2%%</Port>
                <LoginName>%%LoginName2%%</LoginName>
                <DomainRequired>off</DomainRequired>
                <DomainName></DomainName>
                <SPA>off</SPA>
                <SSL>%%SSL2%%</SSL>
                <AuthRequired>on</AuthRequired>
            </Protocol>
        </Account>
    </Response>
</Autodiscover>
