
import SyliusTaxonomyTree from './sylius-taxon-tree';
import './sylius-move-taxon';
import '../scss/main.scss';

$(document).ready(function () {

    new SyliusTaxonomyTree();

    $('.sylius-taxon-move-up').taxonMoveUp();
    $('.sylius-taxon-move-down').taxonMoveDown();
});