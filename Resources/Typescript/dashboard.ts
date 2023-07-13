import { generateForm } from "./generate_forms.js";
import { dataBlock, generateStats } from "./statistics.js";
import { dataSection, generateTableArticle, rowInfo } from "./table.js";


generateStats()


generateTableArticle('invoices','Invoices','Invoice Number','Dates','Company')
rowInfo('invoices','FNXXXX','xx/xx/xx','Company')

generateTableArticle('contacts','Contacts','Name','Phone','Email')
rowInfo('contacts','Contact','071-XXX-XXX','example@mail.com')

generateTableArticle('companies','Companies','Name','TVA','Country')
rowInfo('companies','Company','N°XXXXXX','Country')

generateForm('invoice','reference','date','company')
generateForm('company','name','phone','email')
generateForm('contact','name','tva','country')