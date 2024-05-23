<!DOCTYPE html>
<html lang="">
    <head>
		<?php $this->load->view("template/_partials/head") ?>
    </head>
    <body class=" text-gray-900">
		
		<?php $this->load->view("template/_partials/topbar") ?>
		<?php $this->load->view("template/_partials/sidebar") ?>

		<div class="p-4 sm:ml-64">
			<div class="p-4 mt-14">
				<section class="p-5 overflow-y-auto mt-5">
					<div class="head lg:flex grid grid-cols-1 justify-between w-full">
						<div class="heading flex-auto">
							<p class="text-blue-950 font-sm text-xs">
								Apotek
							</p>
							<h2 class="font-bold tracking-tighter text-2xl text-theme-text">
								<?=$title?>
							</h2>
						</div>
					</div>
					<div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
                        <table class="display w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable">
							<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
								<tr>
									<th class="px-4 py-3">No</th>
									<th scope="col" class="px-4 py-3">No. RM</th>
									<th scope="col" class="px-4 py-3">NIK</th>
									<th scope="col" class="px-4 py-3">No. JKN</th>
									<th scope="col" class="px-4 py-3">Nama</th>
									<th scope="col" class="px-4 py-3">Diagnosa</th>
									<th scope="col" class="px-4 py-3">Status</th>
									<th scope="col" class="px-4 py-3">
										<span class="sr-only">Actions</span>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data as $key => $item): ?>
									<tr class="border-b dark:border-gray-700">
										<td class="px-4 py-3"><?php echo $key + 1; ?></td>
										<td class="px-4 py-3"><?=ucwords($item->no_rm)?></td>
										<td class="px-4 py-3"><?=ucwords($item->nik)?></td>
										<td class="px-4 py-3"><?=$item->no_jkn != null ? $item->no_jkn : '-'?></td>
										<td class="px-4 py-3"><?=ucwords($item->name)?></td>
										<td class="px-4 py-3"><?=ucwords($item->diagnosa_name)?></td>
										<td class="px-4 py-3">
                                            <?php if ($item->status_pemeriksaan == 'sukses') : ?>
                                                <span class="text-green-400"><?=ucwords($item->status_pemeriksaan)?></span>
                                            <?php elseif ($item->status_pemeriksaan == 'batal') : ?>
                                                <span class="text-red-400"><?=ucwords($item->status_pemeriksaan)?></span>
                                            <?php else : ?>
                                                <span><?=ucwords($item->status_pemeriksaan)?></span>
                                            <?php endif; ?>
                                        </td>
										<td class="px-4 py-3 flex items-center">
                                            <a href="#" class="btn-rincian text-white bg-yellow-300 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-yellow-600 dark:hover:bg-yellow-300 dark:focus:ring-yellow-300"
                                            data-rm_id="<?=$item->id?>">
                                                Rincian
                                            </a>
                                            <?php if ($item->status_pemeriksaan == 'pending') : ?>
                                                <a href="<?=base_url('apotek/create/'.$item->id)?>" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    Selesaikan
                                                </a>
                                            <?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</section>
			</div>
		</div>
	</body>
	<?php $this->load->view("template/_partials/script") ?>
    <script>
        // Formatting function for row details - modify as you need
        function format(res) {            
            const response = JSON.parse(res)
            const data = response.data
            let diagnosa_elements = ``
            let obat_elements = ``

            if (data) {
                const diagnosa = data.diagnosa
                const obat = data.obat
                $.each(diagnosa, function(i, item) {
                    const code = item.code
                    const name = item.name
                    const item_element = `
                        <div>
                            <dd>- ${name}(${code})</dd>
                        </div>
                    `
                    diagnosa_elements += (item_element)
                })
                $.each(obat, function(i, item) {
                    const name = item.name
                    const qty = item.qty
                    const item_element = `
                        <div>
                            <dd>- ${name} (${qty})</dd>
                        </div>
                    `
                    obat_elements += (item_element)
                })
            }
            let row_element = `
                <b>Diagnosa Sekunder</b>
                <div class="grid grid-cols-4 mt-2 mb-4">
                    ${diagnosa_elements}
                </div>
                <b>Obat</b>
                <div class="grid grid-cols-4 mb-2">
                    ${obat_elements}
                </div>
                <hr>
            `;
            return row_element;
        }
        
        function getData(url) { 
            return $.ajax({
                url: url,
                type: 'GET',
            });
        };
        
        let table = new DataTable('#datatable');

        // Add event listener for opening and closing details
        $('#datatable tbody td .btn-rincian').on('click', async function (e) {
            let tr = e.target.closest('tr');
            let row = table.row(tr);
            const rm_id = $(this).data('rm_id')
            const url = "<?=base_url('apotek/detail/')?>"+rm_id
            var data = await getData(url)

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
            }
            else {
                // Open this row
                row.child(format(data)).show();
            }
        });
    </script>
</html>
