@extends('layouts.app')

@section('title', 'Home')

@section('content')
<form id="uploadForm" action="/remove-background" method="post" enctype="multipart/form-data">
@csrf
  <div class="space-y-12">
    <div class="sm:col-span-3">
        <label for="requiredFunction" class="block text-sm font-medium leading-6 text-gray-900">Image Editing</label>
        <div class="mt-2">
          <select id="requiredFunction" name="requiredFunction" autocomplete="function-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <option value="texttoimg">Text To Image</option>
            <option value="removebg">Remove Background</option>
            <option value="cleanup">Cleanup Image</option>
          </select>
        </div>
    </div>
    
    <div class="border-b border-gray-900/10 pb-12">
    
        <div class="col-span-full">
          <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image to be Edited</label>
          <div class="mt-2 flex justify-between rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div id="textfeilds">
              <label for="prompt" class="block mb-2 text-sm font-medium text-gray-900">Add text to converted to an image</label>
              <input type="text" name="prompt" id="prompt" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" placeholder="Start typing..."  />
            </div>

            <div class="w-1/2 text-center" id="mainImage">
              <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex justify-center text-sm leading-6 text-gray-600">
                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                  <span>Upload a file</span>
                  <input id="file-upload" name="image" type="file" class="sr-only" onchange="validateFile('file-upload')">
                </label>
                <p class="pl-1">or drag and drop</p>
                
              </div>
              <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
              <span id="messagefile-upload" style="color: red;"></span>
              <img id="file-uploadPreview" src="#" alt="Image Preview" style="display: none;">
            </div>
            
            <div class="w-1/2 text-center" id="additionalImage">
              <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex justify-center text-sm leading-6 text-gray-600">
                <label for="imageMask" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                  <span>Upload Mask Image</span>
                  <input id="imageMask" name="imageMask" type="file" class="sr-only" onchange="validateFile('imageMask')">
                </label>
                <p class="pl-1">or drag and drop</p>
              </div>
              <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB, image and image mask should be in same size</p>
              <span id="messageimageMask" style="color: red;"></span>
              <img id="imageMaskPreview" src="#" alt="Image Preview" style="display: none;">
              <div class="">
                  <span>Select Proccessing Mode</span>
                  <div>
                    <input type="radio" id="fast" name="mode" value="fast" checked />
                    <label for="fast">Fast</label>
                  </div>
                  <div>
                    <input type="radio" id="quality" name="mode" value="quality" />
                    <label for="quality">Quality</label>
                  </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
  </div>
</form>
@endsection
